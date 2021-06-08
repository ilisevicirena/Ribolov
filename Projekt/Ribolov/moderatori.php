<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/mogucnost.php';
include_once 'klase/baza.php';
$baza = new Baza();

if ($prijavaTip != administrator) {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
} elseif ($prijavaTip == administrator) {
    $poruka = "<a class='edit' href=\"dodijeli_moderatora.php\">Dodijeli moderatora</a>";
   $sql = "select rk.ID_klub, rk.Naziv, k.Korisnicko_ime, k.Ime, k.Prezime from Ribicki_klub rk, Korisnik k, Moderator_klub mk where mk.Ribicki_klub_ID_klub=rk.ID_klub and mk.Korisnik_Korisnicko_ime=k.Korisnicko_ime";
    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'>"
                . "<th>Ribički klub</th><th>Moderator</th><th>Korisničko ime moderatora</th><th>Akcija</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $id=$red["ID_klub"];
            $korisnik=$red["Korisnicko_ime"];
            $poruka .= '<tr><td>' . $red["Naziv"] . '</td><td>' . $red["Ime"] . ' ' . $red["Prezime"] .
                    '</td><td>' . $red["Korisnicko_ime"] . '</td>'. "<td><a href=\""
                    . "edit_moderator.php?id=$id&korisnik=$korisnik\" onClick=\"return confirm('Sigurno želite urediti?')"
                    . "\">Promijeni moderatora</a><br>"
                    . "<a  href=\"delete_moderator.php?id=$id&korisnik=$korisnik\" onClick=\"return confirm('Sigurno želite obrisati?')\">Obriši</a></td>" . '</tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = 'Nema rezultata.';
    }
}


$naslov = "Pregled moderatora";
$dodaci = "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js\"></script>" . "<script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js\"></script>" .
        "<script src=\"https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js\"></script>" . "<script type=\"text/javascript\" src=\"js/iilisevic.js\"></script>";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('poruka', $poruka);
$smarty->display('predlosci/poruka.tpl');
$smarty->display('predlosci/_footer.tpl');
$stranicenje= dohvatiStranicenje();
?>
<script>

    var stranicenje = "<?php Print($stranicenje); ?>";


    $(document).ready(function () {
        $('#tablica1').DataTable(
                {
                    "pageLength": stranicenje,
                    "lengthMenu": [[stranicenje, 20, 50, -1], [stranicenje, 20, 50, "Sve"]],
                
                    "language": {
                        "url": "js/hrvatski.txt"
                    }

                });
    });
</script>


<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/mogucnost.php';
include_once 'klase/baza.php';
$baza = new Baza();
if ($prijavaTip == administrator) {
    $sql = 'select k.*, rk.Naziv, rk.ID_klub from Korisnik k left join Ribicki_klub rk on k.Ribicki_klub_ID_klub=rk.ID_klub';
    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka = "";
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'>"
                . "<th>Korisničko ime</th><th>Ime</th><th>Prezime</th><th>Datum rođenja</th>"
                . "<th>E-mail</th><th>Adresa</th><th>Datum registracije</th><th>Ribički klub</th>"
                . "<th>Blokiran</th><th>Akcija</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $blokiran="ne";
            if($red["Blokiran"]==1){
                $blokiran="da";
            }
            $poruka .= '<tr><td>' . $red["Korisnicko_ime"] . '</td><td>' . $red["Ime"] . '</td><td>' 
                    . $red["Prezime"] . '</td><td>' . $red["Datum_rodenja"] 
                    . '</td><td>' . $red["Email"] . '</td><td>' .
                    $red["Adresa"] . '</td><td>' . $red["Datum_registracije"] .
                    '</td><td>' .$red["Naziv"].'</td><td>'.$blokiran.'</td>'.
                    "<td><a href=\"edit_korisnik.php?id=$red[Korisnicko_ime]"
                    . "\" onClick=\"return confirm('Sigurno želite urediti?')"
                    . "\">Uredi</a><br><a  href=\"delete_korisnik.php?id=$red[Korisnicko_ime]"
                    . "\" onClick=\"return confirm('Sigurno želite obrisati?')"
                    . "\">Obriši</a><br><a href="
                    . "\"blokiraj_korisnika.php?id=$red[Korisnicko_ime]"
                    . "\" onClick=\"return confirm('Sigurno želite blokirati?')"
                    . "\">Blokiraj</a><br><a href=\"odblokiraj_korisnika.php?id=$red[Korisnicko_ime]"
                    . "\" onClick=\"return confirm('Sigurno želite odblokirati?')\">Odblokiraj</a></td>" . '</tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = 'Nema rezultata.';
       // include_once '_poruka.php';
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}


# DIZAJN
$naslov = "Pregled svih korisnika";
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




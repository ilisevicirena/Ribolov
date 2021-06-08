<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();

include_once 'klase/baza.php';
$baza = new Baza();
if (!$prijava || $prijavaTip == korisnik) {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
} else {

    $sql = "SELECT ID_natjecanje, Natjecanje.Naziv from Natjecanje left join Pobjednik on Natjecanje.ID_natjecanje=Pobjednik.Natjecanje_ID_natjecanje where Pobjednik.Natjecanje_ID_natjecanje is null";
    $rsa = $baza->upitDB($sql);
    if ($rsa->num_rows > 0) {
        $poruk = "";
        $poruk .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Naziv natjecanja</th><th>Ime i prezime sudionika</th><th>Bodovi</th><th>Akcija</th></thead>";

        while ($nat = $rsa->fetch_assoc()) {
            $natjecanje = $nat["ID_natjecanje"];
            $naziv = $nat["Naziv"];
            $upit = "select k.Korisnicko_ime, k.Ime, k.Prezime, kn.Bodovi from Korisnik k, Korisnik_natjecanje kn where k.Korisnicko_ime=kn.Korisnik_Korisnicko_ime and kn.Natjecanje_ID_natjecanje='$natjecanje'";
            $rs = $baza->upitDB($upit);

            while ($red = $rs->fetch_assoc()) {
                $korisnik = $red["Korisnicko_ime"];
                $poruk .= '<tr><td>' . $naziv . '</td><td>' . $red["Ime"] . ' ' . $red["Prezime"] . '</td><td>' . $red["Bodovi"] . '</td>' . "<td><a href=\"dodijeli_bodove_korisniku.php?id=$natjecanje&korisnik=$korisnik\" onClick=\"return confirm('Sigurno želite dodijeliti bodove?')\">Dodijeli bodove</a></td>" . '</tr>';
            }
        }
        $poruk .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = "Nema rezultata";
        include_once '_poruka.php';
    }
}

$naslov = "Pregled natjecanja bez pobjednika";
$dodaci = "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js\"></script>" . "<script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js\"></script>" .
        "<script src=\"https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js\"></script>" . "<script type=\"text/javascript\" src=\"js/iilisevic.js\"></script>";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('poruka', $poruk);
$smarty->display('predlosci/poruka.tpl');
$smarty->display('predlosci/_footer.tpl');
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




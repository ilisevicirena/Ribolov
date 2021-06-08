<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/mogucnost.php';
include_once 'klase/baza.php';
$baza = new Baza();

if (!$prijava) {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}
$poruka = "";
$sql = "select p.ID_prijava, p.Datum_prijave, p.Status, p.Datum_statusa, p.Bodovi_za_prijavu, n.Naziv from Prijava p, Natjecanje n where p.Natjecanje_ID_natjecanje=n.ID_natjecanje and p.Korisnik_Korisnicko_ime='$prijava' ";
$rs = $baza->upitDB($sql);
if ($rs->num_rows > 0) {
    $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Broj prijave</th><th>Datum prijave</th><th>Status prijave</th><th>Datum statusa</th><th>Bodovi za prijavu</th><th>Natjecanje</th></thead>";

    while ($red = $rs->fetch_assoc()) {
        $status = "Odbijeno";
        if ($red["Status"] == 1) {
            $status = "Prihvaćeno";
        } elseif ($red["Status"] == null) {
            $status = "Zahtjev trenutno nije obrađen";
        }
        $poruka .= '<tr><td>' . $red["ID_prijava"] . '</td><td>' . $red["Datum_prijave"] . '</td><td>' . $status . '</td><td>' . $red["Datum_statusa"] . '</td><td>' . $red["Bodovi_za_prijavu"] . '</td><td>' . $red["Naziv"] . '</td><td>' . '</tr>';
    }
    $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
} else {
    $poruka = "Nema rezultata";
  //  include_once '_poruka.php';
}


$naslov = "Pregled mojih natjecanja";
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


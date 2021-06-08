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
$sql = "select n.ID_natjecanje, n.Naziv,n.Opis,n.Pocetak,n.Zavrsetak, k.Bodovi  from Natjecanje n, Korisnik_natjecanje k where n.ID_natjecanje=k.Natjecanje_ID_natjecanje and k.Korisnik_Korisnicko_ime='$prijava'";
$rs = $baza->upitDB($sql);
if ($rs->num_rows > 0) {
    $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Naziv</th><th>Opis</th><th>Početak</th><th>Završetak</th><th>Bodovi</th></thead>";

    while ($red = $rs->fetch_assoc()) {
        $poruka .= '<tr><td>' . $red["Naziv"] . '</td><td>' . $red["Opis"] . '</td><td>' . $red["Pocetak"] . '</td><td>' . $red["Zavrsetak"] . '</td><td>' . $red["Bodovi"] . '</td><td>' . '</tr>';
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


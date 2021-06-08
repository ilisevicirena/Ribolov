<?php
include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();

if ($prijava == null || $prijavaTip != administrator) {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}
include_once 'klase/baza.php';
$baza = new Baza();
include_once 'klase/mogucnost.php';
$vrime = vrijemeSad();
$sortBazaA = array("Datum_vrijeme" => "Vremenu",
    "Korisnik_Korisnicko_ime" => "Korisniku",
    "Opis" => "Opisu");
$sortBazaAscDesc = array("ASC" => "Uzlazno",
    "DESC" => "Silazno");



$poruka = "";




if (isset($_POST["sort"])) {
    $sortiranjepo = $_POST["sortiranje"];
    $uzlsil = $_POST["uzlsil"];
    $datumod = $_POST["datumod"];
    $datumdo = $_POST["datumdo"];




    $sql = "SELECT Korisnik_Korisnicko_ime, Datum_vrijeme, Opis from Dnevnik WHERE Datum_vrijeme>= '$datumod' and Datum_vrijeme<= '$datumdo' ORDER BY $sortiranjepo $uzlsil";

    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Vrijeme</th><th>Korisnik</th><th>Opis</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $poruka .= '<tr><td>' . $red["Datum_vrijeme"] . '</td><td>' . $red["Korisnik_Korisnicko_ime"] . '</td><td>' . $red["Opis"] . '</td></tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = "Nema rezultata";
    }
} 
elseif(isset ($_POST["trazi"])){
    $trazi=$_POST["trazime"];
    $sql = "SELECT Korisnik_Korisnicko_ime, Datum_vrijeme, Opis FROM Dnevnik where Korisnik_Korisnicko_ime like '%$trazi%'"
            . "or Datum_vrijeme like '%$trazi%' or Opis like '%$trazi%'";

    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Vrijeme</th><th>Korisnik</th><th>Opis</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $poruka .= '<tr><td>' . $red["Datum_vrijeme"] . '</td><td>' . $red["Korisnik_Korisnicko_ime"] . '</td><td>' . $red["Opis"] . '</td></tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = "Nema rezultata";
    }
}
elseif(isset ($_POST["sve"])) {
    $sql = "SELECT Korisnik_Korisnicko_ime, Datum_vrijeme, Opis FROM Dnevnik";

    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Vrijeme</th><th>Korisnik</th><th>Opis</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $poruka .= '<tr><td>' . $red["Datum_vrijeme"] . '</td><td>' . $red["Korisnik_Korisnicko_ime"] . '</td><td>' . $red["Opis"] . '</td></tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = "Nema rezultata";
    }
}

else {
    $sql = "SELECT Korisnik_Korisnicko_ime, Datum_vrijeme, Opis FROM Dnevnik";

    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Vrijeme</th><th>Korisnik</th><th>Opis</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $poruka .= '<tr><td>' . $red["Datum_vrijeme"] . '</td><td>' . $red["Korisnik_Korisnicko_ime"] . '</td><td>' . $red["Opis"] . '</td></tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = "Nema rezultata";
    }
}






# DIZAJN
$naslov = "Pregled dnevnika rada";
$dodaci = "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js\"></script>" . "<script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js\"></script>" .
        "<script src=\"https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js\"></script>" . "<script type=\"text/javascript\" src=\"js/iilisevic.js\"></script>";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', basename($_SERVER['PHP_SELF']));
$smarty->assign('sortiranje', $sortBazaA);
$smarty->assign('uzlsil', $sortBazaAscDesc);

$smarty->assign('poruka', $poruka);
$smarty->display('predlosci/ssp.tpl');
$smarty->display('predlosci/_footer.tpl');

$stranicenje = dohvatiStranicenje();
?>
<script>

    var stranicenje = "<?php Print($stranicenje); ?>";


    $(document).ready(function () {
        $('#tablica1').DataTable(
                {
                    "pageLength": stranicenje,
                    "lengthMenu": [[stranicenje, 20, 50, -1], [stranicenje, 20, 50, "Sve"]],
                    "ordering": false,
                    "language": {
                        "url": "js/hrvatski.txt"
                    }

                });
    });
    
 
    
</script>


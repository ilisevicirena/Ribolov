
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
$vrijeme = vrijemeSad();
if ($prijavaTip == administrator || $prijavaTip == moderator) {
    if (isset($_POST["dodaj"])) {
        $bodovi = $_POST["bodovi"];
        $datum_prijave = $_POST["datum"];

        $datum_statusa = $_POST["datum_statusa"];
        $natjecanje = $_POST["natjecanja"];
        $status = $_POST["status"];
        if ($status === '1' || $status === '0') {
            $result = $baza->upitDB("update Prijava set Datum_prijave='$datum_prijave', Status='$status',"
                    . " Datum_statusa='$datum_statusa', Bodovi_za_prijavu='$bodovi', Natjecanje_ID_natjecanje='$natjecanje' WHERE ID_prijava='$id'");
            if ($result) {
                upisiLog("Izmjena: Promjenjeni podaci o prijavi {$id}", $prijava, 3);
                $poruka="Uspješno ste promijenili podatke o prijavi na natjecanje";
                $idi="prijave.php";
                include_once '_poruka.php';
              //  header("Location:prijave.php");
            }
        } else {
            $poruka = "Niste ispravno unijeli status";

            include_once '_poruka.php';
        }
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}

$pogledB = array();
$upit = "SELECT ID_natjecanje, Naziv FROM Natjecanje";
$rezultat = $baza->upitDB($upit);
if ($rezultat->num_rows > 0) {
    while ($red = $rezultat->fetch_assoc()) {
        $pogledB[$red['ID_natjecanje']] = $red['Naziv'];
    }
}
$r=$baza->upitDB("select Datum_prijave, Status, Datum_statusa, Bodovi_za_prijavu from Prijava where ID_prijava='$id' ");
list($d, $s, $ds, $b)=$r->fetch_array();

$naslov = "Uredi prijavu";
$dodaci = "";
$pozovi = "edit_prijava.php?id=$id";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', $pozovi);
$smarty->assign('d',$d);
$smarty->assign('s',$s);
$smarty->assign('ds',$ds);
$smarty->assign('b',$b);
$smarty->assign('myOptions', $pogledB);
$smarty->display('predlosci/edit_prijava.tpl');
$smarty->display('predlosci/_footer.tpl');
?>


<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/baza.php';
$baza = new Baza();
include_once 'klase/dnevnik.php';
$kid = $_GET['id'];
if ($prijavaTip == administrator || $prijavaTip==moderator) {
    if (isset($_POST["dodaj"])) {
        $knaziv = $_POST["klub_naziv"];
        $kopis = $_POST["klub_opis"];
        $kadresa = $_POST["klub_adresa"];
        $kdatum = $_POST["klub_datum"];
        $upit = "update Ribicki_klub set Naziv='$knaziv', Adresa='$kadresa', Opis='$kopis', Datum_osnivanja='$kdatum' where ID_klub='$kid'";
        $rezultat = $baza->upitDB($upit);
        if ($rezultat) {
            $korisnik = $prijava;
            upisiLog("Izmjena: Promjenjeni podaci o ribickom klubu {$knaziv}", $korisnik, 3);
            $poruka="Uspješno ste promijenili podatke o ribičkom klubu.";
            $idi="klubovi.php";
            include_once '_poruka.php';
           // header("Location: klubovi.php");
        }
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}
$r=$baza->upitDB("select Naziv, Opis, Adresa, Datum_osnivanja from Ribicki_klub where ID_klub=$kid");
list($nazivs, $opiss, $adresas, $datums) = $r->fetch_array();

$naslov = "Uredi ribički klub";
$dodaci = "";
$pozovi = "edit_klub.php?id=$kid";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('nazivs',$nazivs);
$smarty->assign('opiss',$opiss);
$smarty->assign('adresas',$adresas);

$smarty->assign('datums',$datums);

$smarty->assign('aktivnaSkripta', $pozovi);
$smarty->display('predlosci/edit_klub.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
   

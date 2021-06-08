<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/baza.php';
$baza = new Baza();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
if ($prijavaTip == administrator || $prijavaTip == moderator) {
    if (isset($_POST["dodaj"])) {
        $datum = $_POST["datum"];
        $status = $_POST["status"];
        $bodovi = $_POST["bodovi"];

        if ($status === '1' || $status === '0') {

            $upit = "update Zahtjev_pobjednik set Datum='$datum', Status='$status', Broj_bodova='$bodovi' "
                    . " where ID_zahtjeva='$id'";
            $rezultat = $baza->upitDB($upit);
            if ($rezultat) {
                $korisnik = $prijava;
                upisiLog("Izmjena: Promjenjeni podaci o zahtjevu {$id}", $korisnik, 3);
                $poruka="Uspješno ste promijenili podatke o zahtjevu za pobjednikom";
                $idi="zahtjevi_za_pobjednikom.php";
                include_once '_poruka.php';
              //  header("Location: zahtjevi_za_pobjednikom.php");
            }
        } else {
            $poruka = "Niste ispravno unijeli status";
            include_once '_poruka.php';
        }
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}
$r=$baza->upitDB("select Datum, Status, Broj_bodova from Zahtjev_pobjednik where ID_zahtjeva='$id'");
list($d,$s,$b)=$r->fetch_array();

$naslov = "Uredi zahtjev za pobjednikom";
$dodaci = "";
$pozovi = "edit_zahtjev.php?id=$id";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('d',$d);
$smarty->assign('s',$s);
$smarty->assign('b',$b);
$smarty->assign('aktivnaSkripta', $pozovi);
$smarty->display('predlosci/edit_zahtjev.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
   

<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/baza.php';
$baza = new Baza();
include_once 'klase/dnevnik.php';
$kid = $_GET['id'];
if ($prijavaTip == administrator) {
    if (isset($_POST["registracija"])) {
        $knaziv = $_POST["naziv"];
        $kopis = $_POST["opis"];
        $kadresa = $_POST["adresa"];
        $kvelicina = $_POST["velicina"];
        $upit = "update Lokacija set Naziv='$knaziv', Adresa='$kadresa', Opis='$kopis', Velicina='$kvelicina' where ID_lokacija='$kid'";
        $rezultat = $baza->upitDB($upit);

        if ($rezultat) {
            $korisnik = $prijava;
            upisiLog("Izmjena: Promjenjeni podaci o lokaciji {$knaziv}", $korisnik, 3);
            $poruka="Uspješno ste promijenili podatke o lokaciji";
            $idi="lokacije.php";
            include_once '_poruka.php';
          //  header("Location: lokacije.php");
        }
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}
$r=$baza->upitDB("select Naziv, Opis, Adresa, Velicina from Lokacija where ID_lokacija='$kid'");
list($n, $o, $a, $v)=$r->fetch_array();
$naslov = "Uredi lokaciju";
$dodaci = "";
$pozovi = "edit_lokacija.php?id=$kid";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('n',$n);
$smarty->assign('o', $o);
$smarty->assign('a',$a);
$smarty->assign('v',$v);
$smarty->assign('aktivnaSkripta', $pozovi);
$smarty->display('predlosci/dodaj_lokaciju.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
   

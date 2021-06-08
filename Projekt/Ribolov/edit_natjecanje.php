<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/baza.php';
$baza = new Baza();
include_once 'klase/dnevnik.php';
$kid = $_GET['id'];
if ($prijavaTip == administrator || $prijavaTip == moderator) {
    if (isset($_POST["dodaj_natjecanje"])) {
        $naziv = $_POST["natjecanje_naziv"];
        $opis = $_POST["natjecanje_opis"];
        $pocetak = $_POST["natjecanje_pocetak"];
        $zavrsetak = $_POST["natjecanje_zavrsetak"];
        $lokacija = $_POST["lokacije"];

        $upit = "update Natjecanje set Naziv='$naziv',  Opis='$opis',Pocetak='$pocetak', Zavrsetak='$zavrsetak', Lokacija_ID_lokacija='$lokacija' where ID_natjecanje='$kid'";
        $rezultat = $baza->upitDB($upit);

        if ($rezultat) {
            $korisnik = $prijava;
            upisiLog("Izmjena: promjenjeni podaci o natjecanju {$knaziv}", $korisnik, 3);
            $poruka="Uspješno ste promijenili podatke o natjecanju";
            $idi="natjecanja.php";
            include_once '_poruka.php';
            //header("Location: natjecanja.php");
        }
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}


$pogledB = array();
$upit = "SELECT ID_lokacija, Naziv FROM Lokacija";
$rezultat = $baza->upitDB($upit);
if ($rezultat->num_rows > 0) {
    while ($red = $rezultat->fetch_assoc()) {
        $pogledB[$red['ID_lokacija']] = $red['Naziv'];
    }
}
$r=$baza->upitDB("select Naziv, Opis, Pocetak, Zavrsetak from Natjecanje where ID_natjecanje='$kid'");
list($n,$o,$p,$z)=$r->fetch_array();
$naslov = "Izmjeni podatke o natjecanju";
$dodaci = "";
$pozovi = "edit_natjecanje.php?id=$kid";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', $pozovi);
$smarty->assign('myOptions', $pogledB);
$smarty->assign('n',$n);
$smarty->assign('o',$o);
$smarty->assign('p',$p);
$smarty->assign('z',$z);
$smarty->display('predlosci/dodaj_natjecanje.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
   

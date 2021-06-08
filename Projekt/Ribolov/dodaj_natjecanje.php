<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/baza.php';
$baza = new Baza();
include_once 'klase/dnevnik.php';
if ($prijavaTip == administrator || $prijavaTip == moderator) {
    if (isset($_POST["dodaj_natjecanje"])) {
        $naziv = $_POST["natjecanje_naziv"];
        $opis = $_POST["natjecanje_opis"];
        $pocetak = $_POST["natjecanje_pocetak"];
        $zavrsetak = $_POST["natjecanje_zavrsetak"];
        $lokacija = $_POST["lokacije"];

        $upit = "insert into Natjecanje(Naziv, Opis, Pocetak, Zavrsetak, Lokacija_ID_lokacija) values('$naziv','$opis','$pocetak','$zavrsetak','$lokacija')";
        $rezultat = $baza->upitDB($upit);
        if ($rezultat) {
            $tekst = "Unos: dodano novo natjecanje {$naziv}";
            $korisnik = $prijava;
            upisiLog($tekst, $korisnik, 3);
            $poruka = "Novo natjecanje uspješno dodano!";
            $idi = "natjecanja.php";
            include_once '_poruka.php';
            
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

$naslov = "Novo natjecanje";
$dodaci = "";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', basename($_SERVER['PHP_SELF']));
$smarty->assign('myOptions', $pogledB);
$smarty->assign('n','');
$smarty->assign('o','');
$smarty->assign('p','');
$smarty->assign('z','');
$smarty->display('predlosci/dodaj_natjecanje.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
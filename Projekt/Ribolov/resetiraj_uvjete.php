
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';
if ($prijavaTip == administrator) {
    $rezultat = $baza->upitDB("select * from Korisnik");
    include_once 'klase/mogucnost.php';
    while ($red = $rezultat->fetch_assoc()) {
        $korisnik = $red["Korisnicko_ime"];
        $mail = $red["Email"];
        $br1 = rand(1, 99999999999999999);
        $br2 = rand(1, 99999999999999999);
        $kod = $br1 . $br2;
        $result = $baza->upitDB("update Korisnik set Uvjeti_koristenja='$kod' WHERE Korisnicko_ime='$korisnik'");

        upisiLog("Izmjena: Resetirani uvjeti koristenja!", $prijava, 3);

        $naslov = "Ribolov - Uvjeti korištenja";
        $aktivacija = rokAktivacije();
        $poruka = "Postovani, molimo vas da u roku od {$aktivacija}h prihvatite uvjete korištenja klikom na "
                . "link: http://barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x055/uvjeti_koristenja.php?kljuc={$kod} ";
        mail($mail, $naslov, $poruka);
    }
    $poruka = "Uspješno ste resetirali uvjete korištenja";
    $idi = "postavke.php";
    include_once '_poruka.php';
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}

 



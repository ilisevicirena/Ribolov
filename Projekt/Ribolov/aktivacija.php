<?php

include_once 'klase/mogucnost.php';
$aktivacija = rokAktivacije();

# NAKON REGISTRACIJE/AKTIVACIJE PORUKA
if (isset($_GET['poruka'])) {
    if ($_GET['poruka'] == 1) {
        $poruka = "Poštovani, kako bi dovršili registraciju molimo vas da u roku od {$aktivacija}h aktivirate svoj "
                . "korisnički račun klikom na link koji Vam je poslan na uneseni email.";
    } else if ($_GET['poruka'] == 2) {
        $idi = "prijava.php";
        $poruka = "Poštovani, uspješno ste aktivirali svoj korisnički račun!<br/><br/>"
                . "<small>Uskoro ćete biti usmjereni na prijavu.</small>";
    } else {
        header("Location: greske.php?kod=20"); # RUCNO UNESENA PORUKA
    }
    # DIZAJN
    $naslov = "Poruka";
    include '_poruka.php';
    exit();
}

# AKTIVACIJA PREKO MAIL-A
if (isset($_GET['kljuc'])) {
    $kljuc = $_GET['kljuc'];

    include_once 'klase/baza.php';
    include_once 'klase/dnevnik.php';
    $baza = new Baza();

    $upit = "SELECT Korisnicko_ime,Datum_registracije FROM Korisnik where Status_aktivacije='{$kljuc}'";
    $rezultat = $baza->upitDB($upit);
    if ($rezultat->num_rows == 1) {
        $vrime = vrijemeSad();
        $redak = $rezultat->fetch_array();
        $vrimeReg = $redak['Datum_registracije'];

        $aktiviro = new DateTime($vrime);
        $istek = new DateTime($vrimeReg);
        $istek->modify("+{$aktivacija} hour");

        if ($aktiviro <= $istek) {
            $upit = "update Korisnik set Status_aktivacije=1,Aktiviran='1' where Status_aktivacije='{$kljuc}'";
            $baza->upitDB($upit, 16); # DO BAZE
            upisiLog("Aktivacija: Uspješna aktivacija korisničkog računa!", $redak['Korisnicko_ime'], 5);
            header("Location: aktivacija.php?poruka=2");
        } else {
            upisiLog("Aktivacija: Rok istekao za aktivaciju korisničkog računa!", $redak['Korisnicko_ime'], 5);
            header("Location: greske.php?kod=23"); # ROK ISTEKAO
        }
    } else {
        header("Location: greske.php?kod=18"); # DO KLJUCA
    }
} else {
    header("Location: registracija.php");
}
?>
<?php

include_once 'klase/mogucnost.php';
$aktivacija = rokAktivacije();
if (isset($_GET['poruka'])) {
    if ($_GET['poruka'] == 2) {
        $idi = "prijava.php";
        $poruka = "Poštovani, uspješno ste prihvatili nove uvjete korištenja!<br/><br/>"
                . "<small>Uskoro ćete biti usmjereni na početnu stranicu.</small>";
    } else {
        header("Location: greske.php?kod=20"); # RUCNO UNESENA PORUKA
    }
    # DIZAJN
    $naslov = "Poruka";
    include_once '_poruka.php';
    exit();
}

# AKTIVACIJA PREKO MAIL-A
if (isset($_GET['kljuc'])) {
    $kljuc = $_GET['kljuc'];

    include_once 'klase/baza.php';
    include_once 'klase/dnevnik.php';
    $baza = new Baza();

    $upit = "SELECT Korisnicko_ime  FROM Korisnik where Uvjeti_koristenja='{$kljuc}'";
    $rezultat = $baza->upitDB($upit);
    if ($rezultat->num_rows == 1) {

        $redak = $rezultat->fetch_array();


        $aktiviro = new DateTime($vrime);
        $istek = new DateTime($vrimeReg);
        $istek->modify("+{$aktivacija} hour");

        if ($aktiviro <= $istek) {
            $upit = "update Korisnik set Uvjeti_koristenja=1 where Uvjeti_koristenja='{$kljuc}'";
            $baza->upitDB($upit, 16); # DO BAZE
            upisiLog("Izmjena: Prihvaceni uvjeti koristenja!", $redak['Korisnicko_ime'], 3);
            header("Location: uvjeti_koristenja.php?poruka=2");
        } else {
            upisiLog("Aktivacija: Rok istekao za prihvacanje uvjeta obratite se administratoru!", $redak['Korisnicko_ime'], 5);
            header("Location: greske.php?kod=23"); # ROK ISTEKAO
        }
    } else {
        header("Location: greske.php?kod=18"); # DO KLJUCA
    }
}
?>
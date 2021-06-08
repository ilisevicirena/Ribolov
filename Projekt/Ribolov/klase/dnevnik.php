<?php

include_once 'sesija.php';
include_once 'baza.php';
include_once 'mogucnost.php';

function upisiLog($tekst, $korisnik = null,$radnja='3') {
    $baza = new Baza();
    $vrime = vrijemeSad();

    if ($korisnik == null) {
        if(dohvatiLogKorId() != ''){
            $korisnik = dohvatiLogKorId();
            $upit = "insert into Dnevnik(Opis,Datum_vrijeme,Korisnik_Korisnicko_ime,Tip_radnje_ID_radnja) values('$tekst','$vrime','$korisnik','$radnja');";
        }
        else {
            $upit = "insert into Dnevnik(Opis,Datum_vrijeme,Tip_radnje_ID_radnja) values('$tekst','$vrime','$radnja');";
        }
    } elseif($korisnik!=null) {
        $upit = "insert into Dnevnik(Opis,Datum_vrijeme,Korisnik_Korisnicko_ime,Tip_radnje_ID_radnja) values('$tekst','$vrime','$korisnik','$radnja');";
    }

    $baza->upitDB($upit);
}

?>
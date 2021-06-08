<?php

function dohvatiMogucnost($kljuc){
    
    $vrijednost=null;
    
    include_once 'baza.php';
    $baza = new Baza();

    $upit = "SELECT vrijednost FROM Konfiguracija where kljuc='{$kljuc}'";
    $rezultat = $baza->upitDB($upit);
    if ($rezultat->num_rows == 1) {
        $red = $rezultat->fetch_array();
        $vrijednost = $red['vrijednost'];
    }
    
    return $vrijednost;
}

function vrijemeSad() {

    $pomak = dohvatiPomak();
    $vrime = date("Y-m-d H:i:s", mktime(date('H') + $pomak));

    return $vrime;
}

function rokAktivacije() {

    $aktivacija=dohvatiMogucnost("aktivacija");
    if($aktivacija==null){
        $aktivacija = 24; # U ROKU 24h AKTIVACIJA
    }

    return $aktivacija;
}

function dohvatiPomak() {

    $pomak=dohvatiMogucnost("pomak");
    if($pomak==null){
        $pomak = 0; # 0 POMAKNUTIH SATI
    }

    return $pomak;
}

function dohvatiZakljucavanje() {

    $zakljucavanje=dohvatiMogucnost("zakljucavanje");
    if($zakljucavanje==null){
        $zakljucavanje = 3; # 3 POGREŠNA UNOSA
    }

    return $zakljucavanje;
}

function dohvatiStranicenje() {

    $stranicenje=dohvatiMogucnost("stranicenje");
    if($stranicenje==null){
        $stranicenje = 7; 
    }

    return $stranicenje;
}
function dohvatiKolacic() {

    $kolacic=dohvatiMogucnost("kolacic");
    if($kolacic==null){
        $stranicenje = 1; 
    }

    return $kolacic;
}

?>
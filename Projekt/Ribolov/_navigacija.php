<?php

$nav = array('Početna' => 'index.php',
    'O autoru' => 'oAutoru.html',
);
if ($prijava == null) {
    $nav['Prijava'] = 'prijava.php';
}


$nav['Registracija'] = 'registracija.php';
$nav['Natjecanja'] = 'natjecanja.php';
$nav['Pobjednici'] = 'pobjednici.php';
$nav['Ribički klubovi'] = 'klubovi.php';
$nav['Dokumentacija'] = 'dokumentacija.html';


if ($prijava != null) {
    $nav['br_1'] = '-';
    $prijavaTip = dohvatiLogKorTip();

    if ($prijavaTip != null) {
        $nav['Profil'] = 'profil.php';
        $nav['Prijava na natjecanje'] = 'prijava_na_natjecanje.php';
    }
    if ($prijavaTip == administrator) {
        $nav['Profil'] = 'profil.php';
        $nav['Prijava na natjecanje'] = 'prijava_na_natjecanje.php';
        $nav['Lokacije'] = 'lokacije.php';
        $nav['Korisnici'] = 'korisnici.php';
        $nav['Zahtjevi za prijavu'] = 'zahtjevi_za_prijavu.php';
        $nav['Prijave'] = 'prijave.php';
        $nav['Zahtjevi za pobjednikom'] = 'zahtjevi_za_pobjednikom.php';
        $nav['Zahtjevi za aktivaciju'] = 'zahtjevi_za_aktivaciju.php';
        $nav['Dodijeli bodove'] = 'dodijeli_bodove.php';
        $nav['Moderatori'] = 'moderatori.php';
        $nav['Dnevnik'] = 'dnevnik.php';
        $nav['Postavke'] = 'postavke.php';
    }
    if ($prijavaTip == moderator) {
        $nav['Profil'] = 'profil.php';
        $nav['Prijava na natjecanje'] = 'prijava_na_natjecanje.php';
        $nav['Zahtjevi za prijavu'] = 'zahtjevi_za_prijavu.php';
        $nav['Prijave'] = 'prijave.php';
        $nav['Novi zahtjev za pobjednikom'] = 'zahtjev_za_pobjednikom.php';
        $nav['Dodijeli bodove'] = 'dodijeli_bodove.php';
    }
    
    $nav['Odjava'] = 'odjava.php';
}


$smarty->assign('nav', $nav);
$smarty->display('predlosci/_navigacija.tpl');
?>
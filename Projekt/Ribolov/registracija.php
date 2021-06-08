<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();

include_once 'klase/baza.php';
$baza = new Baza();




if (isset($_POST["registracija"])) {

    include_once 'klase/mogucnost.php';

    $korime = $_POST["korisnici_korime"];
    $ime = $_POST["korisnici_ime"];
    $lozinka = $_POST["korisnici_lozinka"];
    $lozinka_potvrda = $_POST["korisnici_lozinka_potvrda"];
    $prezime = $_POST["korisnici_prezime"];
    $adresa = $_POST["korisnici_adresa"];
    $datum = $_POST["korisnici_datum"];
    $email = $_POST["korisnici_email"];
    $uvjeti="0";
    if (isset($_POST["korisnici_uvjeti"])) {
           $uvjeti="1";
    }
 


    #VALIDACIJA FORMULARA SA SERVERSKE STRANE
    #UNOS POLJA KORISNICKO IME
    if (empty($korime)) {
        header("Location: greske.php?kod=1&povratak=3");
        exit();
    }

    $upit = "SELECT * FROM Korisnik where Korisnicko_ime='$korime'";

    #POSTOJI KORISNICKO IME
    $rezultat = $baza->upitDB($upit);
    if ($rezultat->num_rows != 0) {
        header("Location: greske.php?kod=0&povratak=3");
        exit();
    }

    #UNOS SVIH POLJA
    if (empty($ime)) {
        header("Location: greske.php?kod=2&povratak=3");
        exit();
    }
    if (empty($prezime)) {
        header("Location: greske.php?kod=3&povratak=3");
        exit();
    }
    if (empty($lozinka)) {
        header("Location: greske.php?kod=4&povratak=3");
        exit();
    }
    if (empty($lozinka_potvrda)) {
        header("Location: greske.php?kod=5&povratak=3");
        exit();
    }
    if (empty($adresa)) {
        header("Location: greske.php?kod=6&povratak=3");
        exit();
    }
    if (empty($email)) {
        header("Location: greske.php?kod=7&povratak=3");
        exit();
    }
     if (empty($datum)) {
        header("Location: greske.php?kod=7&povratak=3");
        exit();
    }

    #EMAIL, PHP >= 5.2
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: greske.php?kod=8&povratak=3");
        exit();
    }

   

    #LOZINKE JEDNAKE
    if ($lozinka !== $lozinka_potvrda) {
        header("Location: greske.php?kod=10&povratak=3");
        exit();
    }

    #IME PREZIME SAMO SLOVA
    if (!preg_match("#^[a-zšđžčćA-ZŠĐŽČĆ ]+$#", $ime)) {
        header("Location: greske.php?kod=11&povratak=3");
        exit();
    }
    if (!preg_match("#^[a-zšđžčćA-ZŠĐŽČĆ ]+$#", $prezime)) {
        header("Location: greske.php?kod=12&povratak=3");
        exit();
    }
    #IME PREZIME PRVO VELIKO
    if (!preg_match("#[A-ZĐŽŠĆČ]#", $ime)) {
        header("Location: greske.php?kod=13&povratak=3");
        exit();
    }
    if (!preg_match("#[A-ZĐŽŠĆČ]#", $prezime)) {
        header("Location: greske.php?kod=14&povratak=3");
        exit();
    }
//SLIKA
    
     #VALIDACIJA recaptcha
      $privatekey = "6Ld0nVsUAAAAACIsEil9YYSBSE30e9iUmjnDpomA";
    $resp = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$privatekey.'&response='.$_POST['g-recaptcha-response']);
$deco= json_decode($resp);
   /* if (!$deco->success) {
        header("Location: greske.php?kod=15&povratak=3");
        exit();
    }*/
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    #SVE OK -> UNOS i MAIL AKTIVACIJE
    $vrime = vrijemeSad();
    $br1 = rand(1, 99999999999999999);
    $br2 = rand(1, 99999999999999999);
    $kod = $br1 . $br2;
    $salt= sha1($korime);
    $kriptirana_lozinka= sha1($salt."--".$lozinka);
   
    $upit = "insert into Korisnik(Korisnicko_ime,Ime,Prezime,Datum_rodenja,Email,Lozinka_citljivo,Lozinka_kriptirano,Adresa,Datum_registracije,Aktiviran,Uvjeti_koristenja,Blokiran,Slika,Tip_korisnika_ID_tip,Ribicki_klub_ID_klub,Status_prijava,Status_aktivacije) values("
            . "'$korime','$ime','$prezime','$datum','$email','$lozinka','$kriptirana_lozinka','$adresa','$vrime','0','$uvjeti','0','0','2',null,'0','$kod'); ";
    $baza->upitDB($upit,16); # DO BAZE
   
    
    
    
    include_once 'klase/dnevnik.php';
    upisiLog("Registracija: Uspješna registracija korisnika: {$ime} {$prezime}!",$korime, 4);
    
    $naslov = "Ribolov - Aktivacija korisnickog racuna";
    $aktivacija = rokAktivacije();
    $poruka = "Postovani, molimo vas da u roku od {$aktivacija}h aktivirate svoj korisnicki racun klikom na "
            . "link: http://barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x055/aktivacija.php?kljuc={$kod} ";
    mail($email, $naslov, $poruka);
    header("Location: aktivacija.php?poruka=1");
}



# DIZAJN
require_once('recaptcha/recaptchalib.php');
$publickey = "6LedGKYUAAAAAGHe_uFI3SMgX7rXKGRa-srF1qyv";
$naslov = "Registracija korisnika";
$dodaci = "<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js\"></script><script src=\"js/jqRegistracija.js\"></script><script src=\"https://www.google.com/recaptcha/api.js\" async defer></script>";
include '_header.php';
include '_navigacija.php';
$reca="<div class='g-recaptcha' data-sitekey='6Ld0nVsUAAAAACuz-e_jqPJpLyVaiAIgkmx8h-JO'></div>";
$smarty->assign('aktivnaSkripta', basename($_SERVER['PHP_SELF']));
$smarty->assign('recaptcha',$reca );

$smarty->display('predlosci/registracija.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
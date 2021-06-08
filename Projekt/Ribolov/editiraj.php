<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();

include_once 'klase/baza.php';
$baza = new Baza();
if (!$prijava) {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}

if (isset($_POST["registracija"])) {

    include_once 'klase/mogucnost.php';


    $ime = $_POST["korisnici_ime"];
    $lozinka = $_POST["korisnici_lozinka"];
    $lozinka_potvrda = $_POST["korisnici_lozinka_potvrda"];
    $prezime = $_POST["korisnici_prezime"];
    $adresa = $_POST["korisnici_adresa"];
    $datum = $_POST["korisnici_datum"];
    $email = $_POST["korisnici_email"];

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


    $salt = sha1($prijava);
    $kriptirana_lozinka = sha1($salt . "--" . $lozinka);

    $upit = "update Korisnik set Ime='$ime', Prezime='$prezime', Lozinka_citljivo='$lozinka', Lozinka_kriptirano='$kriptirana_lozinka', Adresa='$adresa', Email='$email', Datum_rodenja='$datum' where Korisnicko_ime='$prijava'; ";
    $rez = $baza->upitDB($upit, 16); # DO BAZE
    if ($rez) {
        $poruka = "Poštovani, Vaši podaci su uspješno promijenjeni!";
        $idi = "profil.php";
        include_once '_poruka.php';
    }
    include_once 'klase/dnevnik.php';
    upisiLog("Izmjena: Korisnik {$ime} {$prezime} promijenio podatke !", $prijava, 3
    );
}
$r=$baza->upitDB("select Ime, Prezime, Adresa, Datum_rodenja, Email from Korisnik where Korisnicko_ime='$prijava'");
list($i, $p, $a, $d, $e)=$r->fetch_array();


# DIZAJN
$naslov = "Uredi profil";
$dodaci = "<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js\"></script><script src=\"js/jqRegistracija.js\"></script>";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', basename($_SERVER['PHP_SELF']));
$smarty->assign('ime', $i);
$smarty->assign('prezime', $p);
$smarty->assign('adresa', $a);
$smarty->assign('datum', $d);
$smarty->assign('email', $e);

$smarty->display('predlosci/edit_profil.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/baza.php';
$baza = new Baza();
include_once 'klase/dnevnik.php';
$kid = $_GET['id'];
if ($prijavaTip == administrator) {
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
        $tipkor=$_POST["tip"];
        $uvjeti="0";
        if(isset($_POST["korisnici_uvjeti"])){
           $uvjeti = "1"; 
        }
        
        $klub=$_POST["klub"];


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

        $vrime = vrijemeSad();
        $br1 = rand(1, 99999999999999999);
        $br2 = rand(1, 99999999999999999);
        $kod = $br1 . $br2;
        $salt = sha1($korime);
        $kriptirana_lozinka = sha1($salt . "--" . $lozinka);


        $upit = "update Korisnik set Korisnicko_ime='$korime', Ime='$ime', Prezime='$prezime', "
                . "Datum_rodenja='$datum', Email='$email', Lozinka_citljivo='$lozinka', "
                . "Lozinka_kriptirano='$kriptirana_lozinka', Adresa='$adresa',"
                . " Uvjeti_koristenja='$uvjeti', Ribicki_klub_ID_klub=$klub, Tip_korisnika_ID_tip=$tipkor where Korisnicko_ime='$kid'";
        $rezultat = $baza->upitDB($upit);

        if ($rezultat) {
            $korisnik = $prijava;
            upisiLog("Izmjena: Promjenjeni podaci o korisniku {$ime} {$prezime}", $korisnik, 3);
            $poruka="Uspješno ste promijenili podatke o korisniku.";
            $idi="korisnici.php";
            include_once '_poruka.php';
           // header("Location: korisnici.php");
        }
    }
}
 else {
     header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}
$pogledB = array();
$upit = "SELECT ID_klub, Naziv FROM Ribicki_klub";
$rezultat = $baza->upitDB($upit);
if ($rezultat->num_rows > 0) {
    $pogledB['0']="";
    while ($red = $rezultat->fetch_assoc()) {
        $pogledB[$red['ID_klub']] = $red['Naziv'];
    }
}
$tipovi=array("2"=>"Registriran korisnik", "3"=>"Moderator", "4"=>"Administrator");
$r=$baza->upitDB("select Korisnicko_ime, Ime, Prezime, Lozinka_citljivo, Adresa, Datum_rodenja, "
        . "Email from Korisnik where Korisnicko_ime='$kid'");
list($korimes, $imes, $prezimes, $lozinkas, $adresas, $datums, $emails) = $r->fetch_array();

$naslov = "Uredi podatke o korisniku";
$dodaci = "";
$pozovi = "edit_korisnik.php?id=$kid";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('korimes',$korimes);
$smarty->assign('imes',$imes);
$smarty->assign('prezimes',$prezimes);
$smarty->assign('lozinkas',$lozinkas);
$smarty->assign('adresas',$adresas);
$smarty->assign('datums',$datums);
$smarty->assign('emails',$emails);
$smarty->assign('klubovi',$pogledB);
$smarty->assign('tipovi',$tipovi);
$smarty->assign('aktivnaSkripta', $pozovi);
$smarty->display('predlosci/registracija_1.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
   

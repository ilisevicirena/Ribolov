<?php
$uri = $_SERVER["REQUEST_URI"];
$pos = strrpos($uri, "/");
$dir = $_SERVER["SERVER_NAME"] . substr($uri, 0, $pos + 1);

if (!isset($_SERVER["HTTPS"]) || strtolower($_SERVER["HTTPS"]) != "on") {
    $adresa = 'https://' . $dir . 'prijava.php';
    header("Location: $adresa");
    exit();
}
include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();

# REDIREKCIJA AKO JE VEC PRIJAVLJEN
if ($prijava != null) {
    header("Location: index.php");
}

# PRIJAVA NA SUSTAV I REDIKRECIJA
if (isset($_POST["email"])) {

    $p_email = $_POST["email"];
    $p_lozinka = $_POST["lozinka"];
    $status_prijave = -1; # DO MAIL-A

    include_once 'klase/baza.php';
    include_once 'klase/dnevnik.php';

    $baza = new Baza();
    

    $upit = "select Korisnicko_ime, Lozinka_citljivo, Tip_korisnika_ID_tip, Status_prijava FROM Korisnik where Korisnicko_ime = '$p_email' and Aktiviran='1'";
    $rezultat = $baza->upitDB($upit);

    if ($rezultat->num_rows == 1) { # POSTOJI AKTIVIRAN KORISNIK
        list($id, $lozinka, $vrsta, $status_prijava) = $rezultat->fetch_array();

        include_once 'klase/mogucnost.php';
        
        $zakljucavanje = dohvatiZakljucavanje();

        if ($status_prijava < $zakljucavanje) {
            if ($p_lozinka == $lozinka) {
                $status_prijava = 0; # RESET PROMASAJA LOZINKI
                $status_prijave = 1; # MOŽE PRIJAVITI
            } 
           elseif($p_lozinka!=$lozinka) {
                $status_prijava++; # PROMASAJ LOZINKE + 1
                $status_prijave = 0; # DO LOZINKE
                upisiLog("Prijava: {$status_prijava}. put unesena pogresna lozinka prilikom prijave u sustav!", $id, 1);

                if (($status_prijava + 1) == $zakljucavanje) {
                    $status_prijave = 3; # DO LOZINKE, UPOZORENJE ZADNJI POKUŠAJ PRIJE ZAKLJUČAVANJA
                }
            }
            $upit = "update Korisnik set Status_prijava='{$status_prijava}' where Korisnicko_ime = '$p_email'";
            $baza->upitDB($upit);
        } 
        if($status_prijava==$zakljucavanje) {
            upisiLog("Prijava: Pokusaj prijave u sustav zakljucanog korisnika!", $id, 1);
            $status_prijave = 2; # ZAKLJUCAN KORISNIK
            $upit = "update Korisnik set Aktiviran='0' where Korisnicko_ime = '$p_email'";
            $baza->upitDB($upit);
        }
    }

  
        if ($status_prijave == 1) {
            $kolacic= dohvatiKolacic();
            $_SESSION["korisnik"] = $id;
            $_SESSION["tip"] = $vrsta;
            $zapamti = $_POST["zapamti"];
            if ($zapamti == "zapamti") {
                setcookie("korisnik", $p_email, time() + (60*60*$kolacic));
            } 
            if($zapamti != "zapamti") {
                setcookie("korisnik", "", time() - (60*60*$kolacic));
            }
            upisiLog("Prijava: Uspjesna prijava u sustav!", $id, 1);
            header("Location: index.php");
        } 
        if($status_prijave!=1) {
            header("Location: greske.php?kod=" . (19 + $status_prijave));
        }
    
}

# DIZAJN
$naslov = "Prijava korisnika";
//$dodaci = "<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js\"></script><script src=\"js/jqPrijava.js\"></script>";
include '_header.php';
include '_navigacija.php';
if (isset($_COOKIE["korisnik"])) {
    $smarty->assign('korisnik', $_COOKIE["korisnik"]);
}
else{
    $smarty->assign('korisnik', 'korisnik');
}


$smarty->assign('aktivnaSkripta', basename($_SERVER['PHP_SELF']));
$smarty->display('predlosci/prijava.tpl');
$smarty->display('predlosci/_footer.tpl');
?>

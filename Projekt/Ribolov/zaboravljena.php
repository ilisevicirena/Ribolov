<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();

if (isset($_POST["email"])) {
    $email = $_POST["email"];

    include_once 'klase/baza.php';
    include_once 'klase/dnevnik.php';
    include_once 'klase/mogucnost.php';
    $baza = new Baza();

    $upit = "select Email,Lozinka_citljivo FROM Korisnik where Korisnicko_ime = '$email' and Aktiviran='1'";
    $rezultat = $baza->upitDB($upit);
    list($id, $lozinka) = $rezultat->fetch_array();

    if ($rezultat->num_rows == 1) { # POSTOJI AKTIVIRAN KORISNIK
        $vrime = vrijemeSad();
        $lozinka = rand(1, 9999999999) - rand(1, 99999) + rand(1, 9999999999) % 3;
        $upit = "update Korisnik set Lozinka_citljivo='{$lozinka}' where Korisnicko_ime='{$email}'";
        upisiLog("Izmjena: generirana nova lozinka", $email, 3);
        $baza->upitDB($upit, 16); # DO BAZE
        $naslov = "Ribolov - Povrat lozinke";
        $poruka = "Postovani, vasa nova generirana lozinka je: '{$lozinka}', mozete se "
                . "prijaviti klikom na link: http://barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x055/prijava.php";
        mail($id, $naslov, $poruka);


        $poruka = "Poštovani, na uneseni mail je poslana vaša lozinka!";
        $idi = "prijava.php";
        include_once '_poruka.php';
    } else {
        header("Location: greske.php?kod=19&povratak=3"); # NEISPRAVAN MAIL
    }

    exit();
}

# DIZAJN
$naslov = "Zaboravljena lozinka";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', basename($_SERVER['PHP_SELF']));
$smarty->display('predlosci/zaboravljena.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
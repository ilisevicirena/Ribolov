<?php

$greska = $_GET["kod"];
$poruka = "";
switch ($greska) {
    case 0: $poruka = "Zauzeto korisničko ime!<br>";
        break;
    case 1: $poruka = "Polje sa Korisničkim imenom mora biti uneseno. <br />";
        break;
    case 2: $poruka = "Polje Ime mora biti uneseno. <br />";
        break;
    case 3: $poruka = "Polje Prezime mora biti uneseno. <br />";
        break;
    case 4: $poruka = "Polje Lozinka mora biti uneseno. <br />";
        break;
    case 5: $poruka = "Polje Potvrda lozinke mora biti uneseno. <br />";
        break;
    case 6: $poruka = "Polje Adresa mora biti uneseno. <br />";
        break;
    case 7: $poruka = "Polje Datum rođenja mora biti uneseno. <br />";
        break;
    case 8: $poruka = "Netočno strukturirana email adresa.<br />";
        break;
    case 9: $poruka = "Krivo strukturirana lozinka. <br />";
        break;
    case 10: $poruka = "Lozinka i potvrda lozinke nisu identične. <br />";
        break;
    case 11: $poruka = "U polju Ime nisu samo slova. <br />";
        break;
    case 12: $poruka = "U polju Prezime nisu samo slova. <br />";
        break;
    case 13: $poruka = "U polju Ime prvo slovo nije veliko. <br />";
        break;
    case 14: $poruka = "U polju Prezime prvo slovo nije veliko. <br />";
        break;
   
    case 16: $poruka = "Greška pri radu baze podatka.<br/>";
        break;
    case 17: $poruka = "Pristup skripti je moguć samo prijavljenim korisnicima!";
        break;
    case 18: $poruka = "Korisnik nije ispravno unesen ili ne postoji!";
        break;
    case 19: $poruka = "Neispravno korisničko ime ili lozinka!";
        break;
    case 20: $poruka = "Nemate pravo pristupa ovoj skripti!";
        break;
    case 21: $poruka = "Korisnički račun Vam je zaključan, obratite se administratoru!";
        break;
    case 22: $poruka = "Kriva lozinka, ostao Vam je još jedan pokušaj prije nego Vam se račun zaključa!";
        break;
    case 23: $poruka = "Rok aktivacije je istekao!";
        break;
   
    default: $poruka = "Nepoznata pogreška.";
        break;
}

if (isset($_GET['povratak'])) {
    $poruka .= "<script>setTimeout(function(){window.history.back()}, " . ($_GET['povratak'] * 1000) . ");</script>";
}

# DIZAJN
$naslov="Greška";
include_once '_poruka.php';


?>


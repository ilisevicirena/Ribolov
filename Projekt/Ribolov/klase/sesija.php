<?php

session_start();

        const neregistriran = null;
        const korisnik = 2;
        const moderator = 3;
        const administrator = 4;

function dohvatiLogKorId() {
    $korisnik = null;
    if (isset($_SESSION["korisnik"])) {
        $korisnik = $_SESSION["korisnik"];
    }
    return $korisnik;
}

function dohvatiLogKorTip() {
    $tip = null;
    if (isset($_SESSION["tip"])) {
        $tip = $_SESSION["tip"];
    }
    return $tip;
}

?>

<?php

include_once 'klase/sesija.php';
include_once 'klase/dnevnik.php';

upisiLog("Odjava: Uspjesna odjava iz sustava!");
session_unset($_SESSION["korisnik"]);
session_unset($_SESSION["tip"]);
session_destroy();
header("Location: prijava.php");
?>

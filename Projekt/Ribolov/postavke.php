<?php

include_once 'klase/sesija.php';
$prijava= dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
if ($prijavaTip != administrator) {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}
$naslov = "Postavke";
$dodaci = "";
include_once '_header.php';
include_once '_navigacija.php';


$smarty->display('predlosci/postavke.tpl');
$smarty->display('predlosci/_footer.tpl');


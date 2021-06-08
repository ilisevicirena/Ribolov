<?php
include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();

$slika="<img src=\"img/intro.jpg\" class=\"intro\" />";

$naslov="Početna stranica";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('slika', $slika);
$smarty->display('predlosci/index.tpl');
$smarty->display('predlosci/_footer.tpl');


?>
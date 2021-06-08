<?php
include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();

$usmjeriZa=(isset($usmjeriZa)?$usmjeriZa:3);

if (isset($idi)) {
    header("refresh:{$usmjeriZa};url={$idi}");
}
$naslov="Poruka";
include '_header.php';
include '_navigacija.php';
$smarty->assign('poruka', "<p class=\"praznaTablica\">" . $poruka . "</p>");
$smarty->display('predlosci/poruka.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
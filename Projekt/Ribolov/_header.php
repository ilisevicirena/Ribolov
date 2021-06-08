<?php

require 'Smarty/libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->assign('naslov', $naslov);
$smarty->assign('dodaci', (isset($dodaci)?$dodaci:""));
$smarty->display('predlosci/_header.tpl');

?>

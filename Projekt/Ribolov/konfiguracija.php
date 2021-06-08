<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();

if ($prijava == null || dohvatiLogKorTip() != administrator) {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA  
}

# LOGIRAN ADMIN
include_once 'klase/baza.php';
$baza = new Baza();

if (isset($_POST['preuzmi'])) {
    $obj = json_decode(file_get_contents("http://barka.foi.hr/WebDiP/pomak_vremena/pomak.php?format=json"), TRUE);
    $pomak = $obj["WebDiP"]["vrijeme"]["pomak"]["brojSati"];
    $upit = "update Konfiguracija set vrijednost='{$pomak}' where kljuc='pomak'";
    $baza->upitDB($upit);
}
if (isset($_POST['konfiguracija'])) {
    foreach ($_REQUEST as $kljuc => $vrijednost) {
        $upit = "update Konfiguracija set vrijednost='{$vrijednost}' where kljuc='{$kljuc}'";
        $baza->upitDB($upit);
    }
    # DIZAJN
    $idi = "index.php";
    $poruka = "Poštovani, uspješno ste ažurirali konfiguracije!<br/><br/>"
            . "<small>Uskoro ćete biti preusmjereni.</small>";
    $naslov = "Poruka";
    $usmjeriZa = 2;
    include_once '_poruka.php';
    exit();
}

$upit = "select * from Konfiguracija;";
$rezultat = $baza->upitDB($upit);
$aktivnaSkripta = basename($_SERVER['PHP_SELF']);

$sadrzaj = "<form action=\"{$aktivnaSkripta}\" method=\"POST\">";
while ($red = $rezultat->fetch_array()) {
    $sadrzaj .= "<label for=\"{$red['kljuc']}\">{$red['kljuc']}:</label>"
            . "<input type=\"text\" id=\"{$red['kljuc']}\" name=\"{$red['kljuc']}\" maxlength=\"25\" value=\"{$red['vrijednost']}\"><br>";
}
$sadrzaj .= "<input type=\"submit\" name=\"konfiguracija\" class=\"gumb\" value=\"Spremi\" /> <input type=\"submit\" id=\"preuzmi\" name=\"preuzmi\" class=\"gumb\" value=\"Preuzmi pomak\" /> "
        . "<input type=\"reset\" id=\"resetiraj\" class=\"gumb\" value=\"Briši promjene\" /></form>";


# DIZAJN
$naslov = "Konfiguracija sustava";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('poruka', $sadrzaj);
$smarty->display('predlosci/poruka.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
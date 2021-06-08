
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';
if ($prijavaTip == administrator || $prijavaTip == moderator) {
    $id = $_GET['id'];
    if (isset($_POST["prihvati"])) {
        $bodovi = $_POST["bodovi"];
        $vrijeme = vrijemeSad();
        $result = $baza->upitDB("update Prijava set Status=1, Datum_statusa='$vrijeme', Bodovi_za_prijavu='$bodovi' WHERE ID_prijava=$id");
        if ($result) {
            upisiLog("Izmjena: Prihvacena prijava {$id}", $prijava, 3);

            $upit = "select Korisnik_Korisnicko_ime, Natjecanje_ID_natjecanje from Prijava where ID_prijava=$id";
            $rez = $baza->upitDB($upit);
            $red = $rez->fetch_assoc();
            $korisnik = $red["Korisnik_Korisnicko_ime"];
            $natjecanje = $red["Natjecanje_ID_natjecanje"];

            $upit2 = "insert into Korisnik_natjecanje (Bodovi, Korisnik_Korisnicko_ime, Natjecanje_ID_natjecanje, Prijava_ID_prijava) "
                    . "values ('0',$korisnik','$natjecanje','$id')";
            $baza->upitDB($upit2);
            $poruka="Uspješno ste prihvatili prijavu na natjecanje";
            $idi="prijave.php";
            include_once '_poruka.php';
           // header("Location:prijave.php");
        }
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}


$naslov = "Dodijeli bodove";
$dodaci = "";
$pozovi = "prihvati_prijavu.php?id=$id";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', $pozovi);
$smarty->display('predlosci/prihvati_prijavu.tpl');
$smarty->display('predlosci/_footer.tpl');
?>



<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
if ($prijavaTip == administrator) {
    if (isset($_POST["prihvati"])) {
        $opis = $_POST["opis"];

        $result = $baza->upitDB("update Zahtjev_pobjednik set Status=1 WHERE ID_zahtjeva=$id");

        if ($result) {
            $podaci = $baza->upitDB("select * from Zahtjev_pobjednik where ID_zahtjeva=$id");
            $red = $podaci->fetch_assoc();
            $korisnik = $red["Korisnik_Korisnicko_ime"];
            $natjecanje = $red["Natjecanje_ID_natjecanje"];
            $bodovi = $red["Broj_bodova"];



            $upit2 = "insert into Pobjednik (Broj_bodova, Opis, Korisnik_Korisnicko_ime, Natjecanje_ID_natjecanje)"
                    . "values ('$bodovi', '$opis','$korisnik', '$natjecanje')";
            $baza->upitDB($upit2);
            $mail = $baza->upitDB("select Email from Korisnik where Korisnicko_ime='$korisnik'");
            $email = $mail->fetch_assoc();
            $naslov = "Ribolov - dobili ste nagradu za pobjednika natjecanja";

            $poruka = "Postovani, ovim e-mailom Vas obavještavamo da ste dobili nagradu kao pobjednik natjecanja";
            mail($email["Email"], $naslov, $poruka);
            upisiLog("Unos: Dodan novi pobjednik za natjecanje {$natjecanje}", $prijava, 3);
            $poruka="Uspješno ste prihvatili zahtjev za pobjednikom na natjecanju";
            $idi="zahtjevi_za_pobjednikom.php";
            include_once '_poruka.php';
           // header("Location:zahtjevi_za_pobjednikom.php");
        } else {
            $poruka = "Natjecanje već ima pobjednika";
            include_once '_poruka.php';
        }
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}

$naslov = "Prihvati zahtjev za pobjednikom";
$dodaci = "";
$pozovi = "prihvati_zahtjev.php?id=$id";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', $pozovi);
$smarty->display('predlosci/prihvati_zahtjev.tpl');
$smarty->display('predlosci/_footer.tpl');
?>


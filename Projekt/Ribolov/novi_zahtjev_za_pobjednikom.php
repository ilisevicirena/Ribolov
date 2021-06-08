
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
if ($prijavaTip == administrator || $prijavaTip == moderator) {
    $max = $baza->upitDB("select max(Bodovi)as maks from Korisnik_natjecanje where Natjecanje_ID_natjecanje=$id");
    $o = $max->fetch_assoc();
    $bodovi = $o["maks"];
    $sql = "SELECT k.Korisnicko_ime, k.Ime, k.Prezime, kn.Natjecanje_ID_natjecanje  from Korisnik k, Korisnik_natjecanje kn WHERE k.Korisnicko_ime=kn.Korisnik_Korisnicko_ime and kn.Natjecanje_ID_natjecanje='$id' and kn.Bodovi='$bodovi'";
    $rezultat = $baza->upitDB($sql);

    if ($rezultat) {
        $poruka = "";
        while ($red = $rezultat->fetch_assoc()) {

            $korisnik = $red["Korisnicko_ime"];
            $natjecanje = $red["Natjecanje_ID_natjecanje"];
            $ime = $red["Ime"];
            $prezime = $red["Prezime"];

            $datum = vrijemeSad();
            $result = $baza->upitDB("insert into Zahtjev_pobjednik (Broj_bodova, Datum, Korisnik_Korisnicko_ime, Natjecanje_ID_natjecanje)"
                    . "values('$bodovi', '$datum', '$korisnik', '$id')");

            $poruka .= "Novi zahtjev za pobjednikom na natjecanju $id poslan je administratoru sa sljedećim podacima:"
                    . "Pobjednik: $ime $prezime sa brojem bodova $bodovi";

            if ($result) {


                upisiLog("Unos: Novi zahtjev za pobjednikom {$korisnik}", $prijava, 3);
                header("Location: zahtjev_za_pobjednikom.php");
            }
        }
    } else {
        $idi = "zahtjev_za_pobjednikom.php";
        $poruka = "Nije moguće poslati zahtjev za pobjednikom za odabrano natjecanje";
        include_once'_poruka.php';
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}


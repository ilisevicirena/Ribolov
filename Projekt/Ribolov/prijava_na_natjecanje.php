<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
if (!$prijava) {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}
include_once 'klase/baza.php';
$baza = new Baza();

include_once 'klase/dnevnik.php';
include_once 'klase/mogucnost.php';
$vrijeme = vrijemeSad();
if (isset($_POST["prijava"])) {

    $natjecanje = $_POST["lokacije"];
    $korisnik = $prijava;


    $upit = "select Pocetak, Zavrsetak from Natjecanje where ID_natjecanje='$natjecanje'";
    $rezultat = $baza->upitDB($upit);
    $userfile = $_FILES["userfile"]["tmp_name"];
    $userfile_name = $_FILES["userfile"]["name"];
    $userfile_size = $_FILES["userfile"]["size"];
    $userfile_type = $_FILES["userfile"]["type"];
    $userfile_error = $_FILES["userfile"]["error"];
    if ($userfile_error > 0) {
        echo 'Problem: ';
        switch ($userfile_error) {
            case 1: echo 'Veličina veća od ' . ini_get('upload_max_filesize');
                break;
            case 2: echo 'Veličina veća od ' . $_POST["MAX_FILE_SIZE"] . 'B';
                break;
            case 3: echo 'Datoteka djelomično prenesena';
                break;
            case 4: echo 'Datoteka nije prenesena';
                break;
        }
        exit;
    }


    $upfile = 'img/' . $userfile_name;

    if (is_uploaded_file($userfile)) {
        if (!move_uploaded_file($userfile, $upfile)) {
            echo 'Problem: nije moguće prenijeti datoteku na odredište';
            exit;
        }
    } else {
        echo 'Problem: mogući napad prijenosom. Datoteka: ' . $userfile_name;
        exit;
    }



    if ($rezultat) {
        $red = $rezultat->fetch_array();
        $pocetak_odabrano = $red["Pocetak"];
        $zavrsetak_odabrano = $red["Zavrsetak"];

        $upit2 = "select k.Korisnik_Korisnicko_ime, n.Pocetak, n.Zavrsetak from Korisnik_natjecanje k, Natjecanje n where k.Natjecanje_ID_natjecanje=n.ID_natjecanje and k.Korisnik_Korisnicko_ime='$korisnik' and n.Pocetak<'$pocetak_odabrano' and n.Zavrsetak>'$pocetak_odabrano'";
        $rez = $baza->upitDB($upit2);

        if ($rez->fetch_assoc() != null) {

            $poruka = "Već imate prijavljeno natjecanje u to vrijeme";
            $idi = "prijava_na_natjecanje.php";
            include_once '_poruka.php';
            upisiLog("Unos: Neuspjesna prijava na natjecanje", $korisnik, 3);
        } elseif ($rez->fetch_assoc() === null) {
            $upit = "insert into Prijava (Datum_prijave, Korisnik_Korisnicko_ime, Natjecanje_ID_natjecanje) values('$vrijeme','$korisnik','$natjecanje')";
            $rezult = $baza->upitDB($upit);
            $baza->upitDB("update Korisnik set Slika='$userfile_name' where Korisnicko_ime='$korisnik'");
            if ($rezult) {
                $poruka = "Nova prijava uspješno dodana!";
                $idi = "profil.php";
                include_once '_poruka.php';
                $tekst = "Unos: Dodana nova prijava";
                $korisnik = $prijava;
                upisiLog($tekst, $korisnik, 3);
            }
        }
    }
}
$pogledB = array();
$upit = "SELECT ID_natjecanje, Naziv FROM Natjecanje where Pocetak>'$vrijeme'";
$rezultat = $baza->upitDB($upit);
if ($rezultat->num_rows > 0) {
    while ($red = $rezultat->fetch_assoc()) {
        $pogledB[$red['ID_natjecanje']] = $red['Naziv'];
    }
}

$naslov = "Prijava na natjecanje";
$dodaci = "";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', basename($_SERVER['PHP_SELF']));
$smarty->assign('myOptions', $pogledB);
$smarty->display('predlosci/prijava_na_natjecanje.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
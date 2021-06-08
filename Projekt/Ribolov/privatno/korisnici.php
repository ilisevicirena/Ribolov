<?php

include_once '../klase/baza.php';
$baza = new Baza();

$korisnici = array("","Neregristrirani korisnik","Registrirani korisnik","Moderator","Administrator");

$upit = "SELECT Ime,Prezime,Korisnicko_ime,Lozinka_citljivo,Tip_korisnika_ID_tip FROM Korisnik where Aktiviran=1;";
$podaci = $baza->upitDB($upit);

if ($podaci->num_rows > 0) {
    
    $ispis = "<table><thead><th>Ime</th><th>Prezime</th><th>Korisnicko ime</th><th>Lozinka</th><th>Tip korisnika</th></thead><tbody>";
    $stil=0;
    while ($red = $podaci->fetch_array()) {
        $stil=($stil++)%2+1;
        $ispis.="<tr class=\"tablica1_redak{$stil}\">";
        $ispis.="<td>" . $red['Ime'] . "</td>";
        $ispis.="<td>" . $red['Prezime'] . "</td>";
        $ispis.="<td>" . $red['Korisnicko_ime'] . "</td>";
        $ispis.="<td>" . $red['Lozinka_citljivo'] . "</td>";
        $ispis.="<td>" . $korisnici[$red['Tip_korisnika_ID_tip']] . "</td>";
        $ispis.="</tr>";
    }

    $ispis.="</tbody></table>";
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Korisnici</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/tilisevi.css">
    </head>
    <body>
        <header>Popis korisnika</header>
        <div align="center">
            <section id="sadrzaj_korisnici"><article><br><?php echo $ispis; ?></article></section>
        <?php include '../predlosci/_footer.tpl'; ?>
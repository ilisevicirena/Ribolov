<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/mogucnost.php';
include_once 'klase/baza.php';
$baza = new Baza();
$sortBazaA = array("ID_zahtjeva" => "Broju zahtjeva",
    "Datum" => "Datumu",
    "Status" => "Statusu",
    "Broj_bodova" => "Bodovima");
$sortBazaAscDesc = array("ASC" => "Uzlazno",
    "DESC" => "Silazno");

if ($prijavaTip == administrator) {
    if (isset($_POST["sort"])) {
        $sortpo = $_POST["sortiranje"];
        $uzlsil = $_POST["uzlsil"];
        $sql = "select  z.ID_zahtjeva, z.Broj_bodova, z.Status, z.Datum, k.Ime, k.Prezime, n.Naziv from Zahtjev_pobjednik z, "
            . "Korisnik k, Natjecanje n where z.Korisnik_Korisnicko_ime=k.Korisnicko_ime and z.Natjecanje_ID_natjecanje=n.ID_natjecanje"
            . " and z.Status is null order by $sortpo $uzlsil";
    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka = "";
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Broj zahtjeva</th><th>Ime i Prezime korisnika"
                . "</th><th>Natjecanje</th><th>Broj bodova</th><th>Datum zahtjeva</th><th>Status</th><th>Akcija</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $status = "";

            $poruka .= '<tr><td>' . $red["ID_zahtjeva"] . '</td><td>' . $red["Ime"] . ' ' . $red["Prezime"] .
                    '</td><td>' . $red["Naziv"] . '</td><td>' . $red["Broj_bodova"] . '</td><td>' . $red["Datum"] . '</td><td>' .
                    $status . '</td>' . "<td><a href=\"prihvati_zahtjev.php?id=$red[ID_zahtjeva]\" onClick=\"return confirm('Sigurno želite prihvatiti?')\">Prihvati</a>"
                    . "<br><a href=\"odbij_zahtjev.php?id=$red[ID_zahtjeva]\" onClick=\"return confirm('Sigurno želite odbiti?')\">Odbij</a></td>" . '</tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = "Nema rezultata";
    }
    }
    elseif(isset ($_POST["sve"])){
        $sql = "select  z.ID_zahtjeva, z.Broj_bodova, z.Status, z.Datum, k.Ime, k.Prezime, n.Naziv from Zahtjev_pobjednik z, "
            . "Korisnik k, Natjecanje n where z.Korisnik_Korisnicko_ime=k.Korisnicko_ime and z.Natjecanje_ID_natjecanje=n.ID_natjecanje"
            . " and z.Status is null";
    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka = "";
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Broj zahtjeva</th><th>Ime i Prezime korisnika"
                . "</th><th>Natjecanje</th><th>Broj bodova</th><th>Datum zahtjeva</th><th>Status</th><th>Akcija</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $status = "";

            $poruka .= '<tr><td>' . $red["ID_zahtjeva"] . '</td><td>' . $red["Ime"] . ' ' . $red["Prezime"] .
                    '</td><td>' . $red["Naziv"] . '</td><td>' . $red["Broj_bodova"] . '</td><td>' . $red["Datum"] . '</td><td>' .
                    $status . '</td>' . "<td><a href=\"prihvati_zahtjev.php?id=$red[ID_zahtjeva]\" onClick=\"return confirm('Sigurno želite prihvatiti?')\">Prihvati</a>"
                    . "<br><a href=\"odbij_zahtjev.php?id=$red[ID_zahtjeva]\" onClick=\"return confirm('Sigurno želite odbiti?')\">Odbij</a></td>" . '</tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = "Nema rezultata";
    }
    }else{
    $sql = "select  z.ID_zahtjeva, z.Broj_bodova, z.Status, z.Datum, k.Ime, k.Prezime, n.Naziv from Zahtjev_pobjednik z, "
            . "Korisnik k, Natjecanje n where z.Korisnik_Korisnicko_ime=k.Korisnicko_ime and z.Natjecanje_ID_natjecanje=n.ID_natjecanje"
            . " and z.Status is null";
    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka = "";
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Broj zahtjeva</th><th>Ime i Prezime korisnika"
                . "</th><th>Natjecanje</th><th>Broj bodova</th><th>Datum zahtjeva</th><th>Status</th><th>Akcija</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $status = "";

            $poruka .= '<tr><td>' . $red["ID_zahtjeva"] . '</td><td>' . $red["Ime"] . ' ' . $red["Prezime"] .
                    '</td><td>' . $red["Naziv"] . '</td><td>' . $red["Broj_bodova"] . '</td><td>' . $red["Datum"] . '</td><td>' .
                    $status . '</td>' . "<td><a href=\"prihvati_zahtjev.php?id=$red[ID_zahtjeva]\" onClick=\"return confirm('Sigurno želite prihvatiti?')\">Prihvati</a>"
                    . "<br><a href=\"odbij_zahtjev.php?id=$red[ID_zahtjeva]\" onClick=\"return confirm('Sigurno želite odbiti?')\">Odbij</a></td>" . '</tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = "Nema rezultata";
    }}
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}

$naslov = "Pregled zahtjeva za pobjednikom";
$dodaci = "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js\"></script>" . "<script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js\"></script>" .
        "<script src=\"https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js\"></script>" . "<script type=\"text/javascript\" src=\"js/iilisevic.js\"></script>";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', basename($_SERVER['PHP_SELF']));
$smarty->assign('sortiranje', $sortBazaA);
$smarty->assign('uzlsil', $sortBazaAscDesc);
$smarty->assign('poruka', $poruka);
$smarty->display('predlosci/ssp_sve.tpl');
$smarty->display('predlosci/_footer.tpl');
$stranicenje = dohvatiStranicenje();
?>
<script>

    var stranicenje = "<?php Print($stranicenje); ?>";


    $(document).ready(function () {
        $('#tablica1').DataTable(
                {
                    "pageLength": stranicenje,
                    "lengthMenu": [[stranicenje, 20, 50, -1], [stranicenje, 20, 50, "Sve"]],
                    "ordering": false,
                    "language": {
                        "url": "js/hrvatski.txt"
                    }

                });
    });
</script>





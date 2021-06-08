<?php
include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/mogucnost.php';
include_once 'klase/baza.php';
$baza = new Baza();
$sortBazaA = array("ID_prijava" => "Broju prijave",
    "Datum_prijave" => "Datumu",
    "Status" => "Statusu",
    "Bodovi_za_prijavu" => "Bodovima");
$sortBazaAscDesc = array("ASC" => "Uzlazno",
    "DESC" => "Silazno");
if (!$prijava || $prijavaTip == korisnik) {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
} else {
    if (isset($_POST["sort"])) {
        $sortpo = $_POST["sortiranje"];
        $uzlsil = $_POST["uzlsil"];
        $sql = "select * from Prijava order by $sortpo $uzlsil";
        $rs = $baza->upitDB($sql);
        if ($rs->num_rows > 0) {
            $poruka = "<a class='edit' href=\"zahtjevi_za_prijavu.php\">Zahtjevi za prijavu</a>";
            $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Broj prijave</th><th>Datum prijave</th><th>Status prijave</th><th>Datum statusa</th><th>Bodovi za prijavu</th><th>Natjecanje</th><th>Akcija</th></thead>";

            while ($red = $rs->fetch_assoc()) {
                $status = "Odbijeno";
                if ($red["Status"] == 1) {
                    $status = "Prihvaćeno";
                } elseif ($red["Status"] == null) {
                    $status = "Zahtjev trenutno nije obrađen";
                }
                $poruka .= '<tr><td>' . $red["ID_prijava"] . '</td><td>' . $red["Datum_prijave"] . '</td><td>' . $status . '</td><td>' . $red["Datum_statusa"] . '</td><td>' . $red["Bodovi_za_prijavu"] . '</td><td>' . $red["Natjecanje_ID_natjecanje"] . '</td>' . "<td><a href=\"edit_prijava.php?id=$red[ID_prijava]\" onClick=\"return confirm('Sigurno želite urediti?')\">Uredi</a><br><a  href=\"delete_prijava.php?id=$red[ID_prijava]\" onClick=\"return confirm('Sigurno želite obrisati?')\">Obriši</a></td>" . '</tr>';
            }
            $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
        } else {
            $poruka = 'Nema rezultata.';
        }
    } elseif (isset($_POST["sve"])) {
        $sql = 'select * from Prijava';
        $rs = $baza->upitDB($sql);
        if ($rs->num_rows > 0) {
            $poruka = "<a class='edit' href=\"zahtjevi_za_prijavu.php\">Zahtjevi za prijavu</a>";
            $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Broj prijave</th><th>Datum prijave</th><th>Status prijave</th><th>Datum statusa</th><th>Bodovi za prijavu</th><th>Natjecanje</th><th>Akcija</th></thead>";

            while ($red = $rs->fetch_assoc()) {
                $status = "Odbijeno";
                if ($red["Status"] == 1) {
                    $status = "Prihvaćeno";
                } elseif ($red["Status"] == null) {
                    $status = "Zahtjev trenutno nije obrađen";
                }
                $poruka .= '<tr><td>' . $red["ID_prijava"] . '</td><td>' . $red["Datum_prijave"] . '</td><td>' . $status . '</td><td>' . $red["Datum_statusa"] . '</td><td>' . $red["Bodovi_za_prijavu"] . '</td><td>' . $red["Natjecanje_ID_natjecanje"] . '</td>' . "<td><a href=\"edit_prijava.php?id=$red[ID_prijava]\" onClick=\"return confirm('Sigurno želite urediti?')\">Uredi</a><br><a  href=\"delete_prijava.php?id=$red[ID_prijava]\" onClick=\"return confirm('Sigurno želite obrisati?')\">Obriši</a></td>" . '</tr>';
            }
            $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
        } else {
            $poruka = 'Nema rezultata.';
        }
    } else {
        $sql = 'select * from Prijava';
        $rs = $baza->upitDB($sql);
        if ($rs->num_rows > 0) {
            $poruka = "<a class='edit' href=\"zahtjevi_za_prijavu.php\">Zahtjevi za prijavu</a>";
            $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Broj prijave</th><th>Datum prijave</th><th>Status prijave</th><th>Datum statusa</th><th>Bodovi za prijavu</th><th>Natjecanje</th><th>Akcija</th></thead>";

            while ($red = $rs->fetch_assoc()) {
                $status = "Odbijeno";
                if ($red["Status"] == 1) {
                    $status = "Prihvaćeno";
                } elseif ($red["Status"] == null) {
                    $status = "Zahtjev trenutno nije obrađen";
                }
                $poruka .= '<tr><td>' . $red["ID_prijava"] . '</td><td>' . $red["Datum_prijave"] . '</td><td>' . $status . '</td><td>' . $red["Datum_statusa"] . '</td><td>' . $red["Bodovi_za_prijavu"] . '</td><td>' . $red["Natjecanje_ID_natjecanje"] . '</td>' . "<td><a href=\"edit_prijava.php?id=$red[ID_prijava]\" onClick=\"return confirm('Sigurno želite urediti?')\">Uredi</a><br><a  href=\"delete_prijava.php?id=$red[ID_prijava]\" onClick=\"return confirm('Sigurno želite obrisati?')\">Obriši</a></td>" . '</tr>';
            }
            $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
        } else {
            $poruka = 'Nema rezultata.';
        }
    }
}

$naslov = "Pregled svih prijava";
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




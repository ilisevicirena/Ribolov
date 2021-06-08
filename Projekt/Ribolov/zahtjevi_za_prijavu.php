<?php
include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();

include_once 'klase/baza.php';
include_once 'klase/mogucnost.php';
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
        $sql = "select * from Prijava where Status is null order by $sortpo $uzlsil";
        $rs = $baza->upitDB($sql);
        if ($rs->num_rows > 0) {
            $poruka = "";
            $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Broj prijave</th><th>Datum prijave</th><th>Status prijave</th><th>Datum statusa</th><th>Bodovi za prijavu</th><th>Natjecanje</th><th>Akcija</th></thead>";

            while ($red = $rs->fetch_assoc()) {
                $status = "";
                $poruka .= '<tr><td>' . $red["ID_prijava"] . '</td><td>' . $red["Datum_prijave"] . '</td><td>' . $status . '</td><td>' . $red["Datum_statusa"] . '</td><td>' . $red["Bodovi_za_prijavu"] . '</td><td>' . $red["Natjecanje_ID_natjecanje"] . "<td><a href=\"prihvati_prijavu.php?id=$red[ID_prijava]\" onClick=\"return confirm('Sigurno želite prihvatiti?')\">Prihvati</a><br><a  href=\"odbij_prijavu.php?id=$red[ID_prijava]\" onClick=\"return confirm('Sigurno želite odbiti?')\">Odbij</a></td>" . '</tr>';
            }
            $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
        } else {
            $poruka = 'Nema novih zahtjeva.';
        }
    
    } elseif (isset($_POST["sve"])) {
        $sql = "select * from Prijava where Status is null";
        $rs = $baza->upitDB($sql);
        if ($rs->num_rows > 0) {
            $poruka = "";
            $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Broj prijave</th><th>Datum prijave</th><th>Status prijave</th><th>Datum statusa</th><th>Bodovi za prijavu</th><th>Natjecanje</th><th>Akcija</th></thead>";

            while ($red = $rs->fetch_assoc()) {
                $status = "";
                $poruka .= '<tr><td>' . $red["ID_prijava"] . '</td><td>' . $red["Datum_prijave"] . '</td><td>' . $status . '</td><td>' . $red["Datum_statusa"] . '</td><td>' . $red["Bodovi_za_prijavu"] . '</td><td>' . $red["Natjecanje_ID_natjecanje"] . "<td><a href=\"prihvati_prijavu.php?id=$red[ID_prijava]\" onClick=\"return confirm('Sigurno želite prihvatiti?')\">Prihvati</a><br><a  href=\"odbij_prijavu.php?id=$red[ID_prijava]\" onClick=\"return confirm('Sigurno želite odbiti?')\">Odbij</a></td>" . '</tr>';
            }
            $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
        } else {
            $poruka = 'Nema novih zahtjeva.';
        }
    } else {



        $sql = "select * from Prijava where Status is null";
        $rs = $baza->upitDB($sql);
        if ($rs->num_rows > 0) {
            $poruka = "";
            $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Broj prijave</th><th>Datum prijave</th><th>Status prijave</th><th>Datum statusa</th><th>Bodovi za prijavu</th><th>Natjecanje</th><th>Akcija</th></thead>";

            while ($red = $rs->fetch_assoc()) {
                $status = "";
                $poruka .= '<tr><td>' . $red["ID_prijava"] . '</td><td>' . $red["Datum_prijave"] . '</td><td>' . $status . '</td><td>' . $red["Datum_statusa"] . '</td><td>' . $red["Bodovi_za_prijavu"] . '</td><td>' . $red["Natjecanje_ID_natjecanje"] . "<td><a href=\"prihvati_prijavu.php?id=$red[ID_prijava]\" onClick=\"return confirm('Sigurno želite prihvatiti?')\">Prihvati</a><br><a  href=\"odbij_prijavu.php?id=$red[ID_prijava]\" onClick=\"return confirm('Sigurno želite odbiti?')\">Odbij</a></td>" . '</tr>';
            }
            $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
        } else {
            $poruka = 'Nema novih zahtjeva.';
        }
    }
}

$naslov = "Pregled zahtjeva za prijavu";
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





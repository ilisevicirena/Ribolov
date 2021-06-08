<?php
include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/mogucnost.php';
include_once 'klase/baza.php';
$baza = new Baza();
$sortBazaA = array("Korisnicko_ime" => "Korisničkom imenu",
    "Ime" => "Imenu",
    "Prezime" => "Prezimenu",
);
$sortBazaAscDesc = array("ASC" => "Uzlazno",
    "DESC" => "Silazno");
if ($prijavaTip == administrator) {
    if (isset($_POST["sort"])) {
        $sortpo = $_POST["sortiranje"];
        $uzlsil = $_POST["uzlsil"];
        $sql = "select * from Korisnik where Aktiviran=0 order by $sortpo $uzlsil";
        $rs = $baza->upitDB($sql);
        if ($rs->num_rows > 0) {
            $poruka = "";
            $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Korisničko ime</th><th>Ime i Prezime korisnika</th><th>Akcija</th></thead>";

            while ($red = $rs->fetch_assoc()) {
                $poruka .= '<tr><td>' . $red["Korisnicko_ime"] . '</td><td>' . $red["Ime"] . ' ' . $red["Prezime"] .
                        '</td>' . "<td><a href=\"aktiviraj_korisnika.php?id=$red[Korisnicko_ime]\" onClick=\"return confirm('Sigurno želite aktivirati?')\">Aktiviraj</a></td>" . '</tr>';
            }
            $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
        } else {
            $poruka = "Nema rezultata";
        }
    } elseif (isset($_POST["sve"])) {
        $sql = "select * from Korisnik where Aktiviran=0";
        $rs = $baza->upitDB($sql);
        if ($rs->num_rows > 0) {
            $poruka = "";
            $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Korisničko ime</th><th>Ime i Prezime korisnika</th><th>Akcija</th></thead>";

            while ($red = $rs->fetch_assoc()) {
                $poruka .= '<tr><td>' . $red["Korisnicko_ime"] . '</td><td>' . $red["Ime"] . ' ' . $red["Prezime"] .
                        '</td>' . "<td><a href=\"aktiviraj_korisnika.php?id=$red[Korisnicko_ime]\" onClick=\"return confirm('Sigurno želite aktivirati?')\">Aktiviraj</a></td>" . '</tr>';
            }
            $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
        } else {
            $poruka = "Nema rezultata";
        }
    } else {
        $sql = "select * from Korisnik where Aktiviran=0";
        $rs = $baza->upitDB($sql);
        if ($rs->num_rows > 0) {
            $poruka = "";
            $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Korisničko ime</th><th>Ime i Prezime korisnika</th><th>Akcija</th></thead>";

            while ($red = $rs->fetch_assoc()) {
                $poruka .= '<tr><td>' . $red["Korisnicko_ime"] . '</td><td>' . $red["Ime"] . ' ' . $red["Prezime"] .
                        '</td>' . "<td><a href=\"aktiviraj_korisnika.php?id=$red[Korisnicko_ime]\" onClick=\"return confirm('Sigurno želite aktivirati?')\">Aktiviraj</a></td>" . '</tr>';
            }
            $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
        } else {
            $poruka = "Nema rezultata";
        }
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}

$naslov = "Pregled zahtjeva za aktivaciju";
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




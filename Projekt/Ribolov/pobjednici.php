<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/mogucnost.php';
include_once 'klase/baza.php';
$baza = new Baza();

if ($prijavaTip == korisnik || $prijava == null) {
    $poruka = "";
    $sql = 'select n.ID_natjecanje, n.Naziv,k.Korisnicko_ime, k.Ime, k.Prezime, k.Slika, p.Broj_bodova'
            . ' from Natjecanje n, Korisnik k, Pobjednik p where p.Korisnik_Korisnicko_ime=k.Korisnicko_ime and '
            . 'p.Natjecanje_ID_natjecanje=n.ID_natjecanje';
    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Natjecanje</th><th>Ime i Prezime</th><th>Broj bodova</th><th>Slika</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $slik = $red["Slika"];
            $slika = "<img src=\"img/$slik\" class=\"pobjednici\" />";
            $poruka .= '<tr><td>' . $red["Naziv"] . '</td><td>' . $red["Ime"] . ' ' . $red["Prezime"] . '</td><td>' . $red["Broj_bodova"] . '</td><td>' . $slika . '</td>' . '</tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = "Nema rezultata";
       // include_once '_poruka.php';
    }
} elseif ($prijavaTip == moderator || $prijavaTip == administrator) {
    $poruka = "";
    $sql = 'select n.ID_natjecanje, n.Naziv,k.Korisnicko_ime, k.Ime, k.Prezime, k.Slika, p.Broj_bodova'
            . ' from Natjecanje n, Korisnik k, Pobjednik p where p.Korisnik_Korisnicko_ime=k.Korisnicko_ime and '
            . 'p.Natjecanje_ID_natjecanje=n.ID_natjecanje';
    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {

        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Natjecanje</th><th>Ime i Prezime</th><th>Broj bodova</th><th>Slika</th><th>Akcija</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $slik = $red["Slika"];
            $slika = "<img src=\"img/$slik\" class=\"pobjednici\" />";
            $natjecanje = $red["ID_natjecanje"];
            $korisnik = $red["Korisnicko_ime"];
            $poruka .= '<tr><td>' . $red["Naziv"] . '</td><td>' . $red["Ime"] . ' ' . $red["Prezime"] . '</td><td>' . $red["Broj_bodova"] . '</td><td>' . $slika . '</td>' . "<td><a href=\"edit_pobjednik.php?id=$natjecanje&korisnik=$korisnik\" onClick=\"return confirm('Sigurno želite urediti?')\">Uredi</a><br><a  href=\"delete_pobjednik.php?id=$natjecanje&korisnik=$korisnik\" onClick=\"return confirm('Sigurno želite obrisati?')\">Obriši</a></td>" . '</tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = "Nema rezultata";
       // include_once '_poruka.php';
    }
}


$naslov = "Pregled svih pobjednika";
$dodaci = "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js\"></script>" . "<script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js\"></script>" .
        "<script src=\"https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js\"></script>" . "<script type=\"text/javascript\" src=\"js/iilisevic.js\"></script>";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('poruka', $poruka);
$smarty->display('predlosci/poruka.tpl');
$smarty->display('predlosci/_footer.tpl');
$stranicenje= dohvatiStranicenje();
?>
<script>

    var stranicenje = "<?php Print($stranicenje); ?>";


    $(document).ready(function () {
        $('#tablica1').DataTable(
                {
                    "pageLength": stranicenje,
                    "lengthMenu": [[stranicenje, 20, 50, -1], [stranicenje, 20, 50, "Sve"]],
                    
                    "language": {
                        "url": "js/hrvatski.txt"
                    }

                });
    });
</script>


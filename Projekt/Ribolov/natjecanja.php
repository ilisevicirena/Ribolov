<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/mogucnost.php';
include_once 'klase/baza.php';
$baza = new Baza();

if ($prijavaTip == korisnik || $prijava == null) {
    $poruka = "";
    $sql = 'select n.ID_natjecanje, n.Naziv,n.Opis,n.Pocetak,n.Zavrsetak,l.Naziv as lokacija, l.Adresa from Natjecanje n left outer join Lokacija l on n.Lokacija_ID_lokacija=l.ID_lokacija';
    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Naziv</th><th>Opis</th><th>Početak</th><th>Završetak</th><th>Lokacija</th><th>Adresa</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $poruka .= '<tr><td>' . $red["Naziv"] . '</td><td>' . $red["Opis"] . '</td><td>' . $red["Pocetak"] . '</td><td>' . $red["Zavrsetak"] . '</td><td>' . $red["lokacija"] . '</td><td>' . $red["Adresa"] . '</td>' . '</tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = 'Nema rezultata.';
    }
} elseif ($prijavaTip == moderator || $prijavaTip == administrator) {
    $poruka = "<a class='edit' href=\"dodaj_natjecanje.php\">Novo natjecanje</a>";
    $sql = 'select n.ID_natjecanje, n.Naziv,n.Opis,n.Pocetak,n.Zavrsetak,l.Naziv as lokacija, l.Adresa from Natjecanje n left outer join Lokacija l on n.Lokacija_ID_lokacija=l.ID_lokacija';
    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Naziv</th><th>Opis</th><th>Početak</th><th>Završetak</th><th>Lokacija</th><th>Adresa</th><th>Akcija</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $poruka .= '<tr><td>' . $red["Naziv"] . '</td><td>' . $red["Opis"] . '</td><td>' . $red["Pocetak"] . '</td><td>' . $red["Zavrsetak"] . '</td><td>' . $red["lokacija"] . '</td><td>' . $red["Adresa"] . '</td>' . "<td><a href=\"edit_natjecanje.php?id=$red[ID_natjecanje]\" onClick=\"return confirm('Sigurno želite urediti?')\">Uredi</a><br><a  href=\"delete_natjecanje.php?id=$red[ID_natjecanje]\" onClick=\"return confirm('Sigurno želite obrisati?')\">Obriši</a></td>" . '</tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = 'Nema rezultata.';
    }
}


$naslov = "Pregled svih natjecanja";
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


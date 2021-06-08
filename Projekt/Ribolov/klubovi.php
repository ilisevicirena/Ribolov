<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/mogucnost.php';
include_once 'klase/baza.php';
$baza = new Baza();

if ($prijavaTip == administrator) {
    $sql = 'select * from Ribicki_klub';
    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka = "<a class='edit' href=\"dodaj_klub.php\">Novi klub</a>";
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Naziv</th><th>Adresa</th><th>Opis</th><th>Datum osnivanja</th><th>Akcija</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $poruka .= '<tr><td>' . $red["Naziv"] . '</td><td>' . $red["Adresa"] . '</td><td>' . $red["Opis"] . '</td><td>' . $red["Datum_osnivanja"] . '</td>' . "<td><a href=\"edit_klub.php?id=$red[ID_klub]\" onClick=\"return confirm('Sigurno želite urediti?')\">Uredi</a><br><a  href=\"delete_klub.php?id=$red[ID_klub]\" onClick=\"return confirm('Sigurno želite obrisati?')\">Obriši</a></td>" . '</tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = 'Nema rezultata.';
        include_once '_poruka.php';
    }
} elseif($prijavaTip==moderator){
    $sql = "select * from Ribicki_klub, Moderator_klub where Ribicki_klub.ID_klub=Moderator_klub.Ribicki_klub_ID_klub and Moderator_klub.Korisnik_Korisnicko_ime='$prijava'";
    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka = "";
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Naziv</th><th>Adresa</th><th>Opis</th><th>Datum osnivanja</th><th>Akcija</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $poruka .= '<tr><td>' . $red["Naziv"] . '</td><td>' . $red["Adresa"] . '</td><td>' . $red["Opis"] . '</td><td>' . $red["Datum_osnivanja"] . '</td>' . "<td><a href=\"edit_klub.php?id=$red[ID_klub]\" onClick=\"return confirm('Sigurno želite urediti?')\">Uredi</a><br><a  href=\"delete_klub.php?id=$red[ID_klub]\" onClick=\"return confirm('Sigurno želite obrisati?')\">Obriši</a></td>" . '</tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = 'Nema rezultata.';
        include_once '_poruka.php';
    }
    
    
    
}




else {
    $sql = 'select * from Ribicki_klub';
    $rs = $baza->upitDB($sql);
    if ($rs->num_rows > 0) {
        $poruka = "";
        $poruka .= "<br><table id='tablica1' width='100%'><thead id='tablica_head'><th>Naziv</th><th>Adresa</th><th>Opis</th><th>Datum osnivanja</th></thead>";

        while ($red = $rs->fetch_assoc()) {
            $poruka .= '<tr><td>' . $red["Naziv"] . '</td><td>' . $red["Adresa"] . '</td><td>' . $red["Opis"] . '</td><td>' . $red["Datum_osnivanja"] . '</td>' . '</tr>';
        }
        $poruka .= "</tbody></table><input type='button' id='ispis' class='gumb' value='Ispis stranice' onclick='window.print();'>";
    } else {
        $poruka = 'Nema rezultata.';
        include_once '_poruka.php';
    }
}
# DIZAJN
$naslov = "Pregled svih ribičkih klubova";
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
                    "ordering": false,
                    "language": {
                        "url": "js/hrvatski.txt"
                    }

                });
    });
</script>




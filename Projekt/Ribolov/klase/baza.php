<?php

class Baza {

    const server = "localhost";
    const baza = "WebDiP2018x055";
    const korisnik = "WebDiP2018x055";
    const lozinka = "admin_glE3";

    function SpojiDB() {

        $mysqli = new mysqli(self::server, self::korisnik, self::lozinka, self::baza);

        if ($mysqli->connect_errno) {
            # DIZAJN
            $poruka = "Neuspješno spajanje na bazu: " . $mysqli->connect_errno . ", " . $mysqli->connect_error;
            $naslov = "Greška baza podataka";
            include '_poruka.php';
            exit();
        }
        return $mysqli;
    }

    function upitDB($upit, $kod = -1) {
        $veza = self::SpojiDB();
        $rezultat = $veza->query($upit);
        if (!$rezultat) {
            $rezultat = null;
            # DIZAJN
            $poruka = "Greška kod upita na bazu! <br/> Greška " . E_USER_ERROR . ": " . $veza->error;
            self::prekidDB($veza);
            if($kod != -1){
                header("Location: greske.php?kod=" . $kod);
            } else {
                $naslov = "Greška baza podataka";
                include '_poruka.php';
            }
            exit();
        }

        self::prekidDB($veza);
        return $rezultat;
    }

    function prekidDB($veza) {
        $veza->close();
    }

}

?>

$(document).ready(function() {
    
    $("#korisnici_lozinka_potvrda").focusout(function(event) {
        var lozinka1 = $('#korisnici_lozinka').val();
        var lozinka2 = $('#korisnici_lozinka_potvrda').val();

        if (lozinka1 == lozinka2) {
            $("#greska").html("");
        } else {
            $("#greska").html("Lozinka i potvrda nisu identične!");
        }
    });
    
   
    
     $("#korisnici_ime").change(function (event) {
        var v = $("#korisnici_ime").val();
        var re = new RegExp(/^[A-Za-z]+$/);
        var ok = re.test(v);
        if (!ok)
        {
             $("#greska").html("Ime se može sastojati samo od slova");
            return false;
        } else {
            $("#greska").html("");
            return true;
        }

    });
    $("#korisnici_ime").change(function (event) {
        var v = $("#korisnici_ime").val();
        var re = new RegExp(/^[A-Z]/);
        var ok = re.test(v);
        if (!ok)
        {
             $("#greska").html("Prvo slovo imena treba biti veliko slovo");
            return false;
        } else {
            $("#greska").html("");
            return true;
        }

    });
    $("#korisnici_prezime").change(function (event) {
        var v = $("#korisnici_prezime").val();
        var re = new RegExp(/^[A-Za-z]+$/);
        var ok = re.test(v);
        if (!ok)
        {
             $("#greska").html("Prezime se može sastojati samo od slova");
            return false;
        } else {
            $("#greska").html("");
            return true;
        }

    });
       $("#korisnici_prezime").change(function (event) {
        var v = $("#korisnici_prezime").val();
        var re = new RegExp(/^[A-Z]/);
        var ok = re.test(v);
        if (!ok)
        {
             $("#greska").html("Prvo slovo prezimena treba biti veliko slovo");
            return false;
        } else {
            $("#greska").html("");
            return true;
        }

    });
    
    $("#korisnici_adresa").change(function (event) {
        var v = $("#korisnici_adresa").val();
        var re = new RegExp(/^[A-Z]/);
        var ok = re.test(v);
        if (!ok)
        {
             $("#greska").html("Prvo slovo adrese treba biti veliko slovo");
            return false;
        } else {
            $("#greska").html("");
            return true;
        }

    });
    
    
});
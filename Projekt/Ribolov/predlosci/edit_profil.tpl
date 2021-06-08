<section id="sadrzaj">
    <article id="greska"></article>
    <article id="formular">
        <form action="{$aktivnaSkripta}" method="POST">
             
            <label for="korisnici_lozinka">Lozinka:</label>
            <input type="password" id="korisnici_lozinka" name="korisnici_lozinka"  maxlength="20" required  /><br/>
            <label for="korisnici_lozinka_potvrda">Potvrda lozinke:</label>
            <input type="password" id="korisnici_lozinka_potvrda" name="korisnici_lozinka_potvrda" maxlength="20" required  /><br/>
            <label for="korisnici_ime">Ime:</label>
            <input type="text" id="korisnici_ime" name="korisnici_ime" value="{$ime}" maxlength="45" required pattern="^[A-ZŠĐŽČĆ]+[a-zšđžčćA-ZŠĐŽČĆ ]*$" placeholder="Obvezno slova i 1. veliko" /><br/>
            <label for="korisnici_prezime">Prezime:</label>
            <input type="text" id="korisnici_prezime" name="korisnici_prezime" value="{$prezime}" maxlength="70" required pattern="^[A-ZŠĐŽČĆ]+[a-zšđžčćA-ZŠĐŽČĆ ]*$" placeholder="Obvezno slova i 1. veliko" /><br/>
            <label for="korisnici_adresa">Adresa:</label>
            <input type="text" id="korisnici_adresa" name="korisnici_adresa" value="{$adresa}" maxlength="100" pattern="^[A-ZŠĐŽČĆ]+[a-zšđžčćA-ZŠĐŽČĆ0-9 ]*$" placeholder="Početno slovo veliko" required /><br/>
            <label for="korisnici_datum">Datum rođenja:</label>
            <input type="date" id="korisnici_datum" name="korisnici_datum" value="{$datum}" maxlength="45"  required /><br/>
            <label for="korisnici_email">E-mail:</label>
            <input type="email" id="korisnici_email" name="korisnici_email" value="{$email}" /><br/>
            
            <input type="submit" id="registracija" name="registracija" class="gumb" value="Spremi" /> 
            
            <input type="reset" id="resetiraj" class="gumb" value="Briši unos" /> 
        </form>&nbsp;
    </article>
</section>
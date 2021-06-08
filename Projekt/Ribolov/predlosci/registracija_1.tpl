<section id="sadrzaj">
    <article id="greska"></article>
    <article id="formular">
        <form action="{$aktivnaSkripta}" method="POST">
            <label for="korisnici_korime">Korisničko ime:</label>
            <input type="text" id="korisnici_korime" name="korisnici_korime" maxlength="70" required autofocus value="{$korimes}" /><br/>
            <label for="korisnici_lozinka">Lozinka:</label>
            <input type="password" id="korisnici_lozinka" name="korisnici_lozinka" maxlength="20" required value="{$lozinkas}" /><br/>
            <label for="korisnici_lozinka_potvrda">Potvrda lozinke:</label>
            <input type="password" id="korisnici_lozinka_potvrda" name="korisnici_lozinka_potvrda" 
                   maxlength="20" required  /><br/>
            <label for="korisnici_ime">Ime:</label>
            <input type="text" id="korisnici_ime" 
             value="{$imes}"      name="korisnici_ime" maxlength="45" required pattern="^[A-ZŠĐŽČĆ]+[a-zšđžčćA-ZŠĐŽČĆ ]*$" placeholder="Obvezno slova i 1. veliko" /><br/>
            <label for="korisnici_prezime">Prezime:</label>
            <input type="text" id="korisnici_prezime" value="{$prezimes}"
                   name="korisnici_prezime" maxlength="70" required pattern="^[A-ZŠĐŽČĆ]+[a-zšđžčćA-ZŠĐŽČĆ ]*$" placeholder="Obvezno slova i 1. veliko" /><br/>
            <label for="korisnici_adresa">Adresa:</label>
            <input type="text" id="korisnici_adresa" 
                   value="{$adresas}" name="korisnici_adresa" maxlength="100" pattern="^[A-ZŠĐŽČĆ]+[a-zšđžčćA-ZŠĐŽČĆ0-9 ]*$" placeholder="Početno slovo veliko" required /><br/>
            <label for="korisnici_datum">Datum rođenja:</label>
            <input type="date" id="korisnici_datum" name="korisnici_datum" maxlength="45" value="{$datums}" required /><br/>
            <label for="korisnici_email">E-mail:</label>
            <input type="email" id="korisn" name="korisnici_email" value="{$emails}" /><br/>
            <label for="korisnici_email">Tip korisnika:</label>
           {html_options id='lokacije' name=tip options=$tipovi }<br/>
            <label>Prihvati uvjete korištenja:</label>
            <input type="checkbox" name="korisnici_uvjeti" checked/><br/>
              <label for="lokacije">Ribički klub:</label>
            {html_options id='lokacije' name=klub options=$klubovi }<br/>
           
            <input type="submit" id="registracija" name="registracija" class="gumb" value="Spremi promjene" /> 
            
            <input type="reset" id="resetiraj" class="gumb" value="Briši unos" /> 
        </form>&nbsp;
    </article>
</section>
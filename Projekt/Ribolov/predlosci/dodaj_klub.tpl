<section id="sadrzaj">
    <article id="greska"></article>
    <article id="formular">
        <form action="{$aktivnaSkripta}" method="POST">
             
            <label for="naziv">Naziv:</label>
            <input type="text" id="naziv" name="klub_naziv"  required  /><br/>
            <label for="opis">Opis:</label>
            <input type="text" id="opis" name="klub_opis"  required  /><br/>
            <label for="adresa">Adresa:</label>
            <input type="text" id="adresa" name="klub_adresa" required  /><br/>
            
            <label for="datum">Datum osnivanja:</label>
            <input type="date" id="datum" name="klub_datum"  required /><br/>
          
           
            <input type="submit" id="registracija" name="dodaj" class="gumb" value="Spremi" /> 
            
            <input type="reset" id="resetiraj" class="gumb" value="Briši unos" /> 
        </form>&nbsp;
    </article>
</section>
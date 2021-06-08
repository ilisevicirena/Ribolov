<section id="sadrzaj">
    <article id="greska"></article>
    <article id="formular">
        <form action="{$aktivnaSkripta}" method="POST">
             
            <label for="naziv">Datum zahtjeva:</label>
            <input type="date" id="naziv" name="datum" value="{$d}" required  /><br/>
            <label for="opis">Status:</label>
            <input type="text" id="opis" name="status" value="{$s}" required placeholder="Upišite 1 za prihvaćeno ili 0 za odbijeno" /><br/>
            <label for="adresa">Broj bodova:</label>
            <input type="number" id="adresa" name="bodovi" value="{$b}" required  /><br/>
            
                    
          
           
            <input type="submit" id="registracija" name="dodaj" class="gumb" value="Spremi" /> 
            
            <input type="reset" id="resetiraj" class="gumb" value="Briši unos" /> 
        </form>&nbsp;
    </article>
</section>
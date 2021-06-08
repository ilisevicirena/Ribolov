<section id="sadrzaj">
    <article id="greska"></article>
    <article id="formular">
        <form action="{$aktivnaSkripta}" method="POST">
             
            <label for="naziv">Datum_prijave:</label>
            <input type="date" id="naziv" name="datum" value="{$d}" required  /><br/>
            <label for="opis">Status prijave:</label>
            <input type="text" id="opis" name="status" value="{$s}" required placeholder="Upišite 1 za prihvaćeno ili 0 za odbijeno" /><br/>
            <label for="adresa">Datum statusa:</label>
            <input type="date" id="adresa" name="datum_statusa" value="{$ds}" required  /><br/>
            
            <label for="datum">Bodovi:</label>
            <input type="number" id="datum" name="bodovi" value="{$b}" required /><br/>
            
             <label for="lokacije">Aktivna natjecanja:</label>
            {html_options id='natjecanja' name='natjecanja' options=$myOptions }<br/>
           
          
           
            <input type="submit" id="registracija" name="dodaj" class="gumb" value="Spremi" /> 
            
            <input type="reset" id="resetiraj" class="gumb" value="Briši unos" /> 
        </form>&nbsp;
    </article>
</section>
<section id="sadrzaj">
    <article id="greska"></article>
    <article id="formular">
        <form enctype="multipart/form-data" action="{$aktivnaSkripta}" method="POST">
             
                     
            <label for="lokacije">Aktivna natjecanja:</label>
            {html_options id='natjecanja' name=lokacije options=$myOptions }<br/>
           <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
           Postavite sliku: <input name="userfile" type="file" /><br/>
            <input type="submit" id="registracija" name="prijava" class="gumb" value="Spremi" /> 
            
            <input type="reset" id="resetiraj" class="gumb" value="Briši unos" /> 
        </form>&nbsp;
    </article>
</section>
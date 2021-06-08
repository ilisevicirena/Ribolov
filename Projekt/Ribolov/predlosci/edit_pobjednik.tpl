<section id="sadrzaj">
    <article id="greska"></article>
    <article id="formular">
        <form action="{$aktivnaSkripta}" method="POST">
             
            <label for="naziv">Broj bodova:</label>
            <input type="number" id="naziv" name="bodovi" value="{$bod}"  required  /><br/>
            <label for="opis">Opis:</label>
            <input type="text" id="opis" name="opis" value="{$op}" required  /><br/>
                    
          
          
           
            <input type="submit" id="registracija" name="spremi" class="gumb" value="Spremi" /> 
            
            <input type="reset" id="resetiraj" class="gumb" value="Briši unos" /> 
        </form>&nbsp;
    </article>
</section>
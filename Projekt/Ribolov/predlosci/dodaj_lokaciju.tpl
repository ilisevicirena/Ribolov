<section id="sadrzaj">
    <article id="greska"></article>
    <article id="formular">
        <form action="{$aktivnaSkripta}" method="POST">
             
            <label for="naziv">Naziv:</label>
            <input type="text" id="naziv" name="naziv" value="{$n}" required  /><br/>
            <label for="opis">Opis:</label>
            <input type="text" id="opis" name="opis" value="{$o}" required  /><br/>
            <label for="adresa">Adresa:</label>
            <input type="text" id="adresa" name="adresa" value="{$a}" required  /><br/>
            
            <label for="velicina">Veličina:</label>
            <input type="text" id="velicina" name="velicina" value="{$v}" required /><br/>
          
           
            <input type="submit" id="registracija" name="registracija" class="gumb" value="Spremi" /> 
            
            <input type="reset" id="resetiraj" class="gumb" value="Briši unos" /> 
        </form>&nbsp;
    </article>
</section>
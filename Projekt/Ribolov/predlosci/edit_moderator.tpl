<section id="sadrzaj">
    <article id="greska"></article>
    <article id="formular">
        <form action="{$aktivnaSkripta}" method="POST">
             
                  
            <label for="lokacije">Moderator:</label>
            {html_options id='lokacije' name=moderator options=$moderatori }<br/>
           
            
                    
          
           
            <input type="submit" id="registracija" name="dodaj" class="gumb" value="Spremi" /> 
            
            <input type="reset" id="resetiraj" class="gumb" value="Briši unos" /> 
        </form>&nbsp;
    </article>
</section>
<section id="sadrzaj">
    <article id="greska"></article>
    <article id="formular">
        <form action="{$aktivnaSkripta}" method="POST">
             
            <label for="naziv">Naziv:</label>
            <input type="text" id="naziv" name="natjecanje_naziv" value="{$n}" required  /><br/>
            <label for="opis">Opis:</label>
            <input type="text" id="opis" name="natjecanje_opis" value="{$o}" required  /><br/>
            <label for="adresa">Početak:</label>
            <input type="datetime" id="datetime" name="natjecanje_pocetak" value="{$p}" required  /><br/>
            
            <label for="datum">Završetak:</label>
            <input type="datetime" id="datum" name="natjecanje_zavrsetak" value="{$z}" required /><br/>
          
            <label for="lokacije">Lokacija:</label>
            {html_options id='lokacije' name=lokacije options=$myOptions }<br/>
           
            <input type="submit" id="registracija" name="dodaj_natjecanje" class="gumb" value="Spremi" /> 
            
            <input type="reset" id="resetiraj" class="gumb" value="Briši unos" /> 
        </form>&nbsp;
    </article>
</section>
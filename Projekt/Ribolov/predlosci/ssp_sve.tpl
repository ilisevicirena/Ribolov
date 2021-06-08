<section id="sadrzaj">
     <article id="formular">
        <form action="{$aktivnaSkripta}" method="POST">
              
            <label class="labelSort">Sortiraj po:</label>
            {html_options class="inputSort" name=sortiranje options=$sortiranje }
           {html_options class="inputSort" name=uzlsil options=$uzlsil }<br/>
         
         
          
            <input type="submit" id="registracija" name="sort" class="gumb" value="Sortiraj" /> 
            
              <input type="submit" id="registracija" name="sve" class="gumb" value="Prikaži sve" /> 
            
            
           
        </form>&nbsp;
    </article>
    
    
    
    {$poruka}
</section>
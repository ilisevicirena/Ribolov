<section id="sadrzaj">
     <article id="formular">
        <form action="{$aktivnaSkripta}" method="POST">
              <input type="text" class="trazi" id="trazi" name="trazime" placeholder="Pretraživanje"><br/>
            <label class="labelSort">Sortiraj po:</label>
            {html_options class="inputSort" name=sortiranje options=$sortiranje }
           {html_options class="inputSort" name=uzlsil options=$uzlsil }<br/>
         
           <label class="labelSort">Od datuma: </label>
           <input type="date" name="datumod" class="inputSort"><br/>
           <label class="labelSort">Do datuma: </label>
            <input type="date" name="datumdo" class="inputSort"><br/>
          
            <input type="submit" id="registracija" name="sort" class="gumb" value="Sortiraj" /> 
             <input type="submit" id="registracija" name="trazi" class="gumb" value="Traži" /> 
              <input type="submit" id="registracija" name="sve" class="gumb" value="Prikaži sve" /> 
            
            
           
        </form>&nbsp;
    </article>
    
    
    
    {$poruka}
</section>
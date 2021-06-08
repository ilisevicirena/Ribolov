<section id='sadrzaj'>
    <article id="greska"></article>
    <article>
          {$slika}
        <ul id="podaci">
            <li>Korisničko ime: {$korime}</li>
            <li>Ime: {$ime}</li>
            <li>Prezime: {$prezime}</li>
            <li>Datum rođenja: {$datum}</li>
            <li>E-mail: {$email}</li>
            <li>Adresa: {$adresa}</li>
            <li>Datum registracije: {$datum_reg}</li>
            
        </ul>
            
            
    </article>
    <article>
        <input type='button' id='ispis' class='gumb' value='Uredi profil' naziv='edit' onclick="document.location.href='editiraj.php'">
         <input type='button' id='ispis' class='gumb' value='Moja natjecanja i rezultati' naziv='moja_natjecanja' onclick="document.location.href='moja_natjecanja.php'">
          <input type='button' id='ispis' class='gumb' value='Moje prijave' naziv='moje_prijave' onclick="document.location.href='moje_prijave.php'">
    </article>
</section>
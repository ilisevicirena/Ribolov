<section id='sadrzaj'>
    <article id="greska"></article>
    <article>
        <form action='{$aktivnaSkripta}' method='POST' id='prijava'>
            <label for="email">Korisničko ime</label>
            <input type='text' id='email' name='email'  required autofocus /><br />
            <label for="lozinka">Lozinka</label>
            <input type='password' id='lozinka' name='lozinka' required /><br />
            <label class="labelSort" for="zapamti">Zapamti me</label>
            <input type="checkbox" id="zapamti" name="zapamti" value="zapamti" checked><br />
            <input type='submit'name="prijava_gumb" value='Prijavi se' /> 
        </form>
    </article>
    <article>
        <a href='registracija.php'>Registracija</a><br/>
        <a href='zaboravljena.php'>Zaboravljena lozinka?</a>
    </article>
</section>
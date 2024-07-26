
<form action="/contatti" class="form-format" method="post">

    <label for="nome">Nome e Cognome <span class="color-red">*</span></label>
    <input type="text" id="nome" placeholder="Mario" name="nome" maxlength="100" required>

    <label for="email">Email <span class="color-red">*</span></label>
    <input type="email" id="email" maxlength="100" placeholder="mybest@mail.it" name="email" required>

    
    <select name="typologie" id="cars" required>
        <option disabled selected value="">Chi sei?</option>
        <option value="privato">Privato</option>
        <option value="azienda">Azienda</option>
        <option value="Developer">Developer</option>
    </select>
    <label for="messaggio">Messaggio <span class="color-red">*</span></label>
    <textarea id="messaggio" name="messaggio" cols="30" minlength="20" rows="10"></textarea>

    <input type="submit" value="Invia" class="btn btn-dblue">

</form>



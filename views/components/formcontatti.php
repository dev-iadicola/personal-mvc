<form action="/contatti" class="form-format" method="post">

    <label for="">Nome e Cognome <span class="color-red">*</span></label>
    <input type="text" placeholder="Mario" name="nome" maxlength="100" required>

   

    <label for="">Email <span class="color-red">*</span></label>
    <input type="email" maxlength="100" placeholder="mybest@mail.it" name="email" required>

    <label for="">Messaggio <span class="color-red">*</span></label>
    <textarea   name="messaggio" cols="30" rows="10"></textarea>

    <input type="submit" value="Invia" class="btn btn-dblue">

</form>
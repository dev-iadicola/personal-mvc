<section class="container my-5 py-5">
    <form method="POST" action="/token/change-password">
        <div class="form-group">
            <label for="exampleInputEmail1">Inserisci la nuova password</label>

            <h3> {{message}} </h3>
            <input type="password" name="password" minlength="8" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             placeholder="Password *" required>
            <input type="password" name="confirmed" minlength="8" class="form-control" 
            id="exampleInputEmail1" aria-describedby="emailHelp"
             placeholder="Ripeti Password*" 
            required>

            <input type="text" hidden name="token" value="{{token}}" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
    </form>
</section>
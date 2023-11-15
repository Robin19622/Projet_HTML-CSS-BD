<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Connection Back office </h1>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form class="form-floating" method="POST" action="/users">
                <div class=" form-floating mb-3">
                    <input type="text" class="form-control " id="floatingInputInvalid" name="login" placeholder="login" value="">
                    <label for="floatingInputInvalid">login obligatoire</label>
                </div>
                <div class=" form-floating mb-3">
                    <input type="password" class="form-control " id="floatingInputInvalid" name="password" placeholder="password" value="">
                    <label for="floatingInputInvalid">mot de passe obligatoire </label>
                </div>
                <br>
                <button type="submit" class="btn btn-dark">Se connecter </button>
            </form>
        </div>
    </div>
</div>
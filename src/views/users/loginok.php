<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1>Bienvenue sur le backoffice Back office </h1>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form class="form-floating" method="POST" action="/users/logout">
                <h3>bonjour <?php echo $_SESSION['User']->login ?></h3>
                <br>
                <button type="submit" class="btn btn-dark">Se deconnecter </button>
            </form>
        </div>
    </div>
</div>
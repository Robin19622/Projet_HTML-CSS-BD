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
            <form class="form-floating" method="POST" action="/<?= WEBROOT2 ?>/users/logout">
                <h3>bonjour<?php echo $_SESSION['User']->prenom . " " . $_SESSION['User']->nom ?></h3>
                <br>
                <button type="submit" class="btn btn-dark">Se deconnecter </button>
            </form>
        </div>
    </div>
</div>
<div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading"><?= $mai->Nom ?><span class="text-muted"> <?= $mai->libelle ?></span></h2>
        <p class="lead"><?= $mai->presentation ?></p>
        <p class="lead"><?= $mai->Prix  ?></p>
    </div>
    <div class="col-md-5">
        <img src="/<?= WEBROOT2 ?>/webroot/img/<?= $mai->photo ?>" alt="<?= $mai->Nom ?>">

    </div>
</div>
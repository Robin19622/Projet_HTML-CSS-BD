<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> <?php if (isset($mai->id)) echo "modifimaiion";
                    else echo "ajout" ?> Maison :</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form class="row g-3 needs-validation" action="/<?= WEBROOT2; ?>/maisons/admin_edit/<?php if (isset($mai->id)) echo $mai->id ?>" method="POST" novalidate>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingid" placeholder="id vérouillé" name="id" readonly="readonly" value="<?php if (isset($mai->id)) {
                                                                                                                                                echo $mai->id;
                                                                                                                                            } else {
                                                                                                                                                if (isset($_POST['id']))
                                                                                                                                                    echo $_POST['id'];
                                                                                                                                            } ?>">
                    <label for="floatingid">id</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " id="floatingName" placeholder="nom maison" name="Nom" value="<?php if (isset($mai->Nom)) {
                                                                                                                                echo $mai->Nom;
                                                                                                                            } else {
                                                                                                                                if (isset($_POST['Nom']))
                                                                                                                                    echo $_POST['Nom'];
                                                                                                                            } ?>" required>
                    <label for="floatingName">Nom maison</label>
                    <div class="invalid-feedback">
                        Le nom maison est obligatoire
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingName" placeholder="Prix" value="<?php if (isset($mai->Prix)) echo $mai->Prix ?>" name="prix">
                    <label for="floatingName">prix</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="presentation"><?php if (isset($mai->presentation)) echo $mai->presentation;
                                                                                                                                else if (isset($_POST['presentation'])) echo $_POST['presentation']; ?></textarea>
                    <label for="floatingName">presentation</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " id="floatingName" placeholder="nom maison" name="photo" value="<?php if (isset($mai->photo)) {
                                                                                                                                echo $mai->photo;
                                                                                                                            } else {
                                                                                                                                if (isset($_POST['photo']))
                                                                                                                                    echo $_POST['photo'];
                                                                                                                            } ?>" required>
                    <label for="floatingName">photo</label>
                    <div class="invalid-feedback">
                        photo est obligatoire
                    </div>
                </div>
                <?php
                $listederoulante = array();
                if (isset($mai)) {
                    $listederoulante = $mai;
                }
                echo $this->liste($cats, "categorie", "Categorie", "id", "categorie", "Nom", $listederoulante);

                ?>
        </div>
        <button type="submit" class="btn btn-outline-secondary">Valider</button>
        </form>
    </div>
</div>
</div>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
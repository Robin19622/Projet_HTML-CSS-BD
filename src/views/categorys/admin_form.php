<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> <?php if (isset($cat->id)) echo "modification";
                    else echo "ajout" ?> catégorie :</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form class="row g-3 needs-validation" action="/<?= WEBROOT2; ?>/categorys/admin_edit/<?php if (isset($cat->id)) echo $cat->id ?>" method="POST" novalidate>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingid" placeholder="id vérouillé" name="id" readonly="readonly" value="<?php if (isset($cat->id)) {
                                                                                                                                                echo $cat->id;
                                                                                                                                            } else {
                                                                                                                                                if (isset($_POST['id']))
                                                                                                                                                    echo $_POST['id'];
                                                                                                                                            } ?>">
                    <label for="floatingid">id</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " id="floatingName" placeholder="nom catégorie" name="Nom" value="<?php if (isset($cat->Nom)) {
                                                                                                                                    echo $cat->Nom;
                                                                                                                                } else {
                                                                                                                                    if (isset($_POST['Nom']))
                                                                                                                                        echo $_POST['Nom'];
                                                                                                                                } ?>" required>
                    <label for="floatingName">Nom catégorie</label>
                    <div class="invalid-feedback">
                        Le nom catégorie est obligatoire
                    </div>
                </div>

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
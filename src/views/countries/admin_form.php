<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> <?php
                if (isset($countrie->id)) {
                    echo "Modification";
                } else echo "Ajout" ?> d'un countrie :</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form class="row g-3 needs-validation" action="/countries/admin_edit/<?php if (isset($countrie->id)) echo $countrie->id ?>" method="POST" novalidate>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingid" placeholder="id vérouillé" name="id" readonly="readonly" value="<?php
                    if (isset($countrie->id)) {
                        echo $countrie->id;
                    } else {
                        if (isset($_POST['id'])) {
                            echo $_POST['id'];
                        }
                    } ?>">
                    <label for="floatingid">id</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " id="floatingName" placeholder="COUNTRIES_NAMES" name="COUNTRIES_NAMES" value="<?php
                    if (isset($countrie->COUNTRIES_NAMES)) {
                        echo $countrie->COUNTRIES_NAMES;
                    } else {
                        if (isset($_POST['COUNTRIES_NAMES'])) {
                            echo $_POST['COUNTRIES_NAMES'];
                        }
                    } ?>" required>
                    <label for="floatingName">COUNTRIES_NAMES </label>
                    <div class="invalid-feedback">
                        Le COUNTRIES_NAMES est obligatoire
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " id="floatingName" placeholder="SHORT_NAMES" name="SHORT_NAMES" value="<?php
                    if (isset($countrie->SHORT_NAMES)) {
                        echo $countrie->SHORT_NAMES;
                    } else {
                        if (isset($_POST['SHORT_NAMES'])) {
                            echo $_POST['SHORT_NAMES'];
                        }
                    } ?>" required maxlength="2" >
                    <label for="floatingName">SHORT_NAMES </label>
                    <div class="invalid-feedback">
                        Le SHORT_NAMES est obligatoire
                    </div>
                </div>
                <?php echo $this->liste($regions, "REGION_ID", "Regions", "id", ["REGIONS_NAMES"]);?>

                <button type="submit" class="btn btn-outline-secondary">Valider</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> <?php
                if (isset($departement->id)) {
                    echo "Modification";
                } else echo "Ajout" ?> d'un departement :</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form class="row g-3 needs-validation" action="/departements/admin_edit/<?php if (isset($departement->id)) echo $departement->id ?>" method="POST" novalidate>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingid" placeholder="id vérouillé" name="id" readonly="readonly" value="<?php
                    if (isset($departement->id)) {
                        echo $departement->id;
                    } else {
                        if (isset($_POST['id'])) {
                            echo $_POST['id'];
                        }
                    } ?>">
                    <label for="floatingid">id</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " id="floatingName" placeholder="DEPARTMENT_NAME" name="DEPARTMENT_NAME" value="<?php
                    if (isset($departement->DEPARTMENT_NAME)) {
                        echo $departement->DEPARTMENT_NAME;
                    } else {
                        if (isset($_POST['DEPARTMENT_NAME'])) {
                            echo $_POST['DEPARTMENT_NAME'];
                        }
                    } ?>" required>
                    <label for="floatingName">DEPARTMENT_NAME</label>
                    <div class="invalid-feedback">
                        Le DEPARTMENT_NAME est obligatoire
                    </div>
                </div>
                <?php echo $this->liste($managers, "MANAGER_ID", "Manager", "id", ["FIRST_NAME","LAST_NAME"]);?>
                <?php echo $this->liste($locations, "LOCATION_ID", "Locations", "id", ["STREET_ADDRESS","CITY","STATE_PROVINCE"]);?>
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
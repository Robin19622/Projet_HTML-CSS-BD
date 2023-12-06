<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> <?php
                if (isset($departement->id)) {
                    echo "Modification";
                } else echo "Ajout" ?> d'un département :</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?php $departement = $departement ?? new stdClass();?>
            <form class="row g-3 needs-validation" action="/departements/admin_edit/<?php if (isset($departement->id)) echo $departement->id ?>" method="POST" novalidate>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($departement, 'id', 'id', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($departement, 'DEPARTMENT_NAME', 'nom du département', true, 'text'); ?>
                </div>
                <?php
                $listederoulante = [];
                if (isset($departement)) {
                    $listederoulante = get_object_vars($departement);
                }
                ?>
                <?php echo $this->liste($managers, "MANAGER_ID", "Manager", "id", ["FIRST_NAME","LAST_NAME"],$listederoulante);?>
                <?php echo $this->liste($locations, "LOCATION_ID", "Locations", "id", ["STREET_ADDRESS","CITY","STATE_PROVINCE"],$listederoulante);?>
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
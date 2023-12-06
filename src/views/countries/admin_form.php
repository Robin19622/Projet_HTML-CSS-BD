<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> <?php
                if (isset($countrie->id)) {
                    echo "Modification";
                } else echo "Ajout" ?> d'un pays :</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?php $countrie = $countrie ?? new stdClass();?>
            <form class="row g-3 needs-validation" action="/countries/admin_edit/<?php if (isset($countrie->id)) echo $countrie->id ?>" method="POST" novalidate>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($countrie, 'id', 'id', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($countrie, 'COUNTRIES_NAMES', 'nom du pays', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($countrie, 'SHORT_NAMES', 'nom raccourci', true, 'text'); ?>
                </div>
                <?php

                $listederoulante = [];
                if (isset($countrie)) {
                    $listederoulante = get_object_vars($countrie);
                }
                ?>
                <?php echo $this->liste($regions, "REGION_ID", "Regions", "id", ["REGIONS_NAMES"],$listederoulante);?>

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
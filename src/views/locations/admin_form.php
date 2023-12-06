<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> <?php
                if (isset($location->id)) {
                    echo "Modification";
                } else echo "Ajout" ?> d'un location :</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?php $location = $location ?? new stdClass();?>
            <form class="row g-3 needs-validation" action="/locations/admin_edit/<?php if (isset($location->id)) echo $location->id ?>" method="POST" novalidate>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($location, 'id', 'id', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($location, 'STREET_ADDRESS', 'STREET_ADDRESS', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($location, 'POSTAL_CODE', 'POSTAL_CODE', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($location, 'CITY', 'CITY', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($location, 'STATE_PROVINCE', 'STATE_PROVINCE', true, 'text'); ?>
                </div>
                <?php
                $listederoulante = [];
                if (isset($location)) {
                    $listederoulante = get_object_vars($location);
                }
                echo $this->liste($countries, "COUNTRY_ID", "Countries", "id", ["COUNTRIES_NAMES"], $listederoulante);
                ?>
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
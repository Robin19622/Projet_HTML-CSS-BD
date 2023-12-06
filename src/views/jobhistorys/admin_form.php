<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> <?php
                if (isset($jobhistory->id)) {
                    echo "Modification";
                } else echo "Ajout" ?> d'un jobhistory :</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?php $jobhistory = $jobhistory ?? new stdClass();?>
            <form class="row g-3 needs-validation" action="/jobhistorys/admin_edit/<?php if (isset($jobhistory->id)) echo $jobhistory->id ?>" method="POST" novalidate>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($jobhistory, 'id', 'id', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($jobhistory, 'START_DATE', 'Date de début', true, 'date'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($jobhistory, 'END_DATE', 'Date de fin', true, 'date'); ?>
                </div>
                <?php
                $listederoulante = [];
                if (isset($jobhistory)) {
                    $listederoulante = get_object_vars($jobhistory);
                }
                echo $this->liste($jobs, "JOB_ID", "Les jobs", "id", ["JOB_TITLE"], $listederoulante);
                echo $this->liste($departements, "DEPARTMENT_ID", "Les jobs", "id", ["DEPARTMENT_NAME"], $listederoulante);
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
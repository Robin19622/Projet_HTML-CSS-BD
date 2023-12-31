<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> <?php
                if (isset($job->id)) {
                    echo "Modification";
                } else echo "Ajout" ?> d'un poste :</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?php $job = $job ?? new stdClass();?>
            <form class="row g-3 needs-validation" action="/jobs/admin_edit/<?php if (isset($job->id)) echo $job->id ?>" method="POST" novalidate>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($job, 'id', 'id', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($job, 'JOB_TITLE', 'titre du poste', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($job, 'MIN_SALARY', 'salaire minimum', true, 'number'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($job, 'MAX_SALARY', 'salaire maximum', true, 'number'); ?>
                </div>
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
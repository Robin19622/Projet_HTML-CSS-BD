<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> <?php
                if (isset($employee->id)) {
                    echo "modification";
                } else echo "Ajout" ?> d'un employé :</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?php $employee = $employee ?? new stdClass();?>
            <form class="row g-3 needs-validation" action="/employees/admin_edit/<?php if (isset($employee->id)) echo $employee->id ?>" method="POST" novalidate>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($employee, 'id', 'Identifiant', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($employee, 'LAST_NAME', 'Nom de famille', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($employee, 'FIRST_NAME', 'Prénom', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($employee, 'EMAIL', 'Email', true, 'email'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($employee, 'PHONE_NUMBER', 'Numéro de téléphone', true, 'text'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($employee, 'HIRE_DATE', "Date d'embauche", true, 'date'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($employee, 'SALARY', "Salaire", true, 'number'); ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $this->generateInputField($employee, 'COMMISSION_PCT', "Commission PCT", true, 'number'); ?>
                </div>
                <?php
                $listederoulante = [];
                if (isset($employee)) {
                    $listederoulante = get_object_vars($employee);
                }
                echo $this->liste(
                    $managers,
                    "MANAGER_ID",
                    "Managers",
                    "id",
                    ['FIRST_NAME', 'LAST_NAME'],$listederoulante
                );
                echo $this->liste($jobs, "JOB_ID", "Jobs", "id", ["JOB_TITLE"],$listederoulante);
                echo $this->liste($departments, "DEPARTMENT_ID", "Department", "id", ["DEPARTMENT_NAME"],$listederoulante);
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
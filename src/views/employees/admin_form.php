<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> <?php
                if (isset($employee->id)) {
                    echo "modification";
                } else echo "ajout" ?> d'un employé :</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form class="row g-3 needs-validation" action="/employees/admin_edit/<?php if (isset($employee->id)) echo $employee->id ?>" method="POST" novalidate>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingid" placeholder="id vérouillé" name="id" readonly="readonly" value="<?php
                    if (isset($employee->id)) {
                        echo $employee->id;
                    } else {
                        if (isset($_POST['id'])) {
                            echo $_POST['id'];
                        }
                    } ?>">
                    <label for="floatingid">id</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " id="floatingName" placeholder="LAST_NAME" name="LAST_NAME" value="<?php
                    if (isset($employee->LAST_NAME)) {
                        echo $employee->LAST_NAME;
                    } else {
                        if (isset($_POST['LAST_NAME'])) {
                            echo $_POST['LAST_NAME'];
                        }
                    } ?>" required>
                    <label for="floatingName">nom de famille</label>
                    <div class="invalid-feedback">
                        Le nom de famille est obligatoire
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " id="floatingName" placeholder="FIRST_NAME" name="FIRST_NAME" value="<?php
                    if (isset($employee->FIRST_NAME)) {
                        echo $employee->FIRST_NAME;
                    } else {
                        if (isset($_POST['FIRST_NAME'])) {
                            echo $_POST['FIRST_NAME'];
                        }
                    } ?>" required>
                    <label for="floatingName">prénom</label>
                    <div class="invalid-feedback">
                        Le prénom est obligatoire
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control " id="floatingName" placeholder="EMAIL" name="EMAIL" value="<?php
                    if (isset($employee->EMAIL)) {
                        echo $employee->EMAIL;
                    } else {
                        if (isset($_POST['EMAIL'])) {
                            echo $_POST['EMAIL'];
                        }
                    } ?>" required>
                    <label for="floatingName">email</label>
                    <div class="invalid-feedback">
                        L'email est obligatoire
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " id="floatingName" placeholder="PHONE_NUMBER" name="PHONE_NUMBER" value="<?php
                    if (isset($employee->PHONE_NUMBER)) {
                        echo $employee->PHONE_NUMBER;
                    } else {
                        if (isset($_POST['PHONE_NUMBER'])) {
                            echo $_POST['PHONE_NUMBER'];
                        }
                    } ?>" required>
                    <label for="floatingName">numéro de téléphone</label>
                    <div class="invalid-feedback">
                        Le numéro de téléphone est obligatoire
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control " id="floatingName" placeholder="HIRE_DATE" name="HIRE_DATE" value="<?php
                    if (isset($employee->HIRE_DATE)) {
                        echo $employee->HIRE_DATE;
                    } else {
                        if (isset($_POST['HIRE_DATE'])) {
                            echo $_POST['HIRE_DATE'];
                        }
                    } ?>" required>
                    <label for="floatingName">date d'embauche</label>
                    <div class="invalid-feedback">
                        La date d'embauche est obligatoire
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" min="1" step="any" class="form-control " id="floatingName" placeholder="SALARY" name="SALARY" value="<?php
                    if (isset($employee->SALARY)) {
                        echo $employee->SALARY;
                    } else {
                        if (isset($_POST['SALARY'])) {
                            echo $_POST['SALARY'];
                        }
                    } ?>" required>
                    <label for="floatingName">salaire</label>
                    <div class="invalid-feedback">
                        Le salaire est obligatoire
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control " id="floatingName" placeholder="COMMISSION_PCT" name="COMMISSION_PCT" value="<?php
                    if (isset($employee->COMMISSION_PCT)) {
                        echo $employee->COMMISSION_PCT;
                    } else {
                        if (isset($_POST['COMMISSION_PCT'])) {
                            echo $_POST['COMMISSION_PCT'];
                        }
                    } ?>" required>
                    <label for="floatingName">commission PCT</label>
                    <div class="invalid-feedback">
                        La commission PCT est obligatoire
                    </div>
                </div>
                <?php
                echo $this->liste(
                    $managers,
                    "MANAGER_ID",
                    "Managers",
                    "id",
                    ['FIRST_NAME', 'LAST_NAME']
                );
                echo $this->liste($jobs, "JOB_ID", "Jobs", "id", ["JOB_TITLE"]);
                echo $this->liste($departments, "DEPARTMENT_ID", "Department", "id", ["DEPARTMENT_NAME"]);
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
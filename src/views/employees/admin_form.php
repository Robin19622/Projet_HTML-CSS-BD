<div class="container">
    <div class="row">
        <div class="col-12">

            <h1> <?php
                if (isset($employee->id)) {
                    echo "modification";
                } else echo "ajout" ?> employee :</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form class="row g-3 needs-validation" action="/employees/admin_edit/<?php
            if (isset($employee->id)) echo $employee->id ?>" method="POST" novalidate>
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
                    <label for="floatingName">LAST_NAME</label>
                    <div class="invalid-feedback">
                        Le LAST_NAME est obligatoire
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
                    <label for="floatingName">FIRST_NAME</label>
                    <div class="invalid-feedback">
                        Le FIRST_NAME est obligatoire
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
                    <label for="floatingName">EMAIL</label>
                    <div class="invalid-feedback">
                        Le EMAIL est obligatoire
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
                    <label for="floatingName">PHONE_NUMBER</label>
                    <div class="invalid-feedback">
                        Le PHONE_NUMBER est obligatoire
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
                    <label for="floatingName">HIRE_DATE</label>
                    <div class="invalid-feedback">
                        Le HIRE_DATE est obligatoire
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
                    <label for="floatingName">SALARY</label>
                    <div class="invalid-feedback">
                        Le SALARY est obligatoire
                    </div>
                </div>

                <?php
                echo $this->liste($managers, "MANAGER_ID", "Managers", "id", ['FIRST_NAME','LAST_NAME']);
                echo $this->liste($jobs, "JOB_ID", "Jobs", "id",  ["JOB_TITLE"]);
                echo $this->liste($departments, "DEPARTMENT_ID", "Department", "id", ["DEPARTMENT_NAME"]);
                ?>
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
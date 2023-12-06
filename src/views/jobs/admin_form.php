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
            <form class="row g-3 needs-validation" action="/jobs/admin_edit/<?php if (isset($job->id)) echo $job->id ?>" method="POST" novalidate>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingid" placeholder="id vérouillé" name="id" readonly="readonly" value="<?php
                    if (isset($job->id)) {
                        echo $job->id;
                    } else {
                        if (isset($_POST['id'])) {
                            echo $_POST['id'];
                        }
                    } ?>">
                    <label for="floatingid">id</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " id="floatingName" placeholder="JOB_TITLE" name="JOB_TITLE" value="<?php
                    if (isset($job->JOB_TITLE)) {
                        echo $job->JOB_TITLE;
                    } else {
                        if (isset($_POST['JOB_TITLE'])) {
                            echo $_POST['JOB_TITLE'];
                        }
                    } ?>" required>
                    <label for="floatingName">titre du poste</label>
                    <div class="invalid-feedback">
                        Le titre du poste est obligatoire
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control " id="floatingName" placeholder="MIN_SALARY" name="MIN_SALARY" value="<?php
                    if (isset($job->MIN_SALARY)) {
                        echo $job->MIN_SALARY;
                    } else {
                        if (isset($_POST['MIN_SALARY'])) {
                            echo $_POST['MIN_SALARY'];
                        }
                    } ?>" required>
                    <label for="floatingName">salaire minimum</label>
                    <div class="invalid-feedback">
                        Le salaire minimum est obligatoire
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control " id="floatingName" placeholder="MAX_SALARY" name="MAX_SALARY" value="<?php
                    if (isset($job->MAX_SALARY)) {
                        echo $job->MAX_SALARY;
                    } else {
                        if (isset($_POST['MAX_SALARY'])) {
                            echo $_POST['MAX_SALARY'];
                        }
                    } ?>" required>
                    <label for="floatingName">salaire maximum</label>
                    <div class="invalid-feedback">
                        Le salaire maximum est obligatoire
                    </div>
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
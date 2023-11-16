<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> <?php if (isset($employee->id)) echo "modification";
                    else echo "ajout" ?> employee :</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form class="row g-3 needs-validation" action="/employees/admin_edit/<?php if (isset($employee->id)) echo $employee->id ?>" method="POST" novalidate>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingid" placeholder="id vérouillé" name="id" readonly="readonly" value="<?php if (isset($employee->id)) {
                                                                                                                                                echo $employee->id;
                                                                                                                                            } else {
                                                                                                                                                if (isset($_POST['id']))
                                                                                                                                                    echo $_POST['id'];
                                                                                                                                            } ?>">
                    <label for="floatingid">id</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " id="floatingName" placeholder="LAST_NAME" name="LAST_NAME" value="<?php if (isset($employee->LAST_NAME)) {
                                                                                                                                    echo $employee->LAST_NAME;
                                                                                                                                } else {
                                                                                                                                    if (isset($_POST['LAST_NAME']))
                                                                                                                                        echo $_POST['LAST_NAME'];
                                                                                                                                } ?>" required>
                    <label for="floatingName">LAST_NAME</label>
                    <div class="invalid-feedback">
                        Le LAST_NAME est obligatoire
                    </div>
                </div>

        </div>
        <button type="submit" class="btn btn-outline-secondary">Valider</button>
        </form>
    </div>
</div>
</div>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
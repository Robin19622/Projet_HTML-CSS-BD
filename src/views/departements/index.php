<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les departements </h1>
            <br>
            <?php
            foreach ($departements as $d) {
                echo $d->DEPARTMENT_NAME ."<br>";
            }
            ?>
            <br>
        </div>
    </div>
</div>
<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les employés </h1>
            <br>
            <?php
            foreach ($employees as $s) {
                echo $s->LAST_NAME . " " . $s->FIRST_NAME . "<br>";
            }
            ?>

            <br>

        </div>

    </div>
</div>
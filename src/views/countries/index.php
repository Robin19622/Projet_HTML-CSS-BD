<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les pays </h1>
            <br>
            <?php
            foreach ($countries as $c) {
                echo $c->COUNTRIES_NAMES ."<br>";
            }
            ?>
            <br>
        </div>
    </div>
</div>
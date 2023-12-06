<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les locations </h1>
            <br>
            <?php
            foreach ($locations as $l) {
                echo $l->STREET_ADDRESS ."<br>";
            }
            ?>
            <br>
        </div>
    </div>
</div>
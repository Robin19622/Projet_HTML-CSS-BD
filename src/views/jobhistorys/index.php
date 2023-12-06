<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les jobhistorys </h1>
            <br>
            <?php
            foreach ($jobhistorys as $j) {
                echo $j->START_DATE ."<br>";
            }
            ?>
            <br>
        </div>
    </div>
</div>
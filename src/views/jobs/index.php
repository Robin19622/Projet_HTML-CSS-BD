<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les jobs </h1>
            <br>
            <?php
            foreach ($jobs as $j) {
                echo $j->JOB_TITLE ."<br>";
            }
            ?>
            <br>
        </div>
    </div>
</div>
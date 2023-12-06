<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les jobhistorys </h1>
            <br>
            <table class="table table-hover  table-sm">
                <thead>
                    <tr class="bg-danger">
                        <th scope="col">Identifiant</th>
                        <th scope="col">START_DATE</th>
                        <th scope="col">END_DATE</th>
                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($jobhistorys as $j) {
                    ?>
                        <tr>
                            <td><?= $j->id ?></td>
                            <td><a class="nav-link text-dark" ><?= $j->START_DATE ?></a></td>
                            <td><a class="nav-link text-dark" ><?= $j->END_DATE ?></a></td>
                            <td><a href="/jobhistorys/admin_edit/<?= $j->id ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="/jobhistorys/admin_delete/<?= $j->id ?>" onclick="return confirm('Voulez vous vraiment supprimer cette employees?');"><i class="far fa-trash-alt"></i></a></td>

                        </tr>
                </tbody>

            <?php
                    }
            ?>
            <tr>
                <td><a href="/jobhistorys/admin_edit/"><i class="fas fa-plus"></i></a></td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
            <tr>
            </table>
            <br>
        </div>
    </div>
</div>
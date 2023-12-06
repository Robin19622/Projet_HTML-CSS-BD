<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les locations </h1>
            <br>
            <table class="table table-hover  table-sm">
                <thead>
                    <tr class="bg-danger">
                        <th scope="col">Identifiant</th>
                        <th scope="col">STREET_ADDRESS</th>
                        <th scope="col">CITY</th>
                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($locations as $l) {
                    ?>
                        <tr>
                            <td><?= $l->id ?></td>
                            <td><a class="nav-link text-dark" ><?= $l->STREET_ADDRESS ?></a></td>
                            <td><a class="nav-link text-dark" ><?= $l->CITY ?></a></td>
                            <td><a href="/locations/admin_edit/<?= $l->id ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="/locations/admin_delete/<?= $l->id ?>" onclick="return confirm('Voulez vous vraiment supprimer cette employees?');"><i class="far fa-trash-alt"></i></a></td>

                        </tr>
                </tbody>

            <?php
                    }
            ?>
            <tr>
                <td><a href="/locations/admin_edit/"><i class="fas fa-plus"></i></a></td>
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
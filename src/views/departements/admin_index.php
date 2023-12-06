<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les departements </h1>
            <br>
            <table class="table table-hover  table-sm">
                <thead>
                    <tr class="bg-danger">
                        <th scope="col">Identifiant</th>
                        <th scope="col">Titres</th>

                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($departements as $d) {
                    ?>
                        <tr>
                            <td><?= $d->id ?></td>
                            <td><a class="nav-link text-dark" href="/departements/view/<?= $d->id ?>"><?= $d->DEPARTMENT_NAME ?></a></td>

                            <td><a href="/departements/admin_edit/<?= $d->id ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="/departements/admin_delete/<?= $d->id ?>" onclick="return confirm('Voulez vous vraiment supprimer cette employees?');"><i class="far fa-trash-alt"></i></a></td>

                        </tr>
                </tbody>

            <?php
                    }
            ?>
            <tr>
                <td><a href="/departements/admin_edit/"><i class="fas fa-plus"></i></a></td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
            <tr>
            </table>
            <br>
        </div>
    </div>
</div>
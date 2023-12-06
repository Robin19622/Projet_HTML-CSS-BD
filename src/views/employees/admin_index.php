<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les employés </h1>
            <br>
            <table class="table table-hover  table-sm">
                <thead>
                    <tr class="bg-danger">
                        <th scope="col">identifiant</th>
                        <th scope="col">employé</th>

                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($employees as $e) {
                    ?>
                        <tr>
                            <td><?= $e->id ?></td>
                            <td><a class="nav-link text-dark" href="/employees/view/<?= $e->id ?>"><?= $e->LAST_NAME ?></a></td>

                            <td><a href="/employees/admin_edit/<?= $e->id ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="/employees/admin_delete/<?= $e->id ?>" onclick="return confirm('Voulez vous vraiment supprimer cette employees?');"><i class="far fa-trash-alt"></i></a></td>

                        </tr>
                </tbody>

            <?php
                    }
            ?>
            <tr>
                <td><a href="/employees/admin_edit/"><i class="fas fa-plus"></i></a></td>
                <td>...</td>

                <td>...</td>
                <td>...</td>
            <tr>
            </table>
            <br>

        </div>

    </div>
</div>
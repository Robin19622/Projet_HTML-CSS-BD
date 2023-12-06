<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les postes </h1>
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
                    <?php foreach ($jobs as $j) {
                    ?>
                        <tr>
                            <td><?= $j->id ?></td>
                            <td><a class="nav-link text-dark" href="/jobs/view/<?= $j->id ?>"><?= $j->JOB_TITLE ?></a></td>

                            <td><a href="/jobs/admin_edit/<?= $j->id ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="/jobs/admin_delete/<?= $j->id ?>" onclick="return confirm('Voulez vous vraiment supprimer cette employees?');"><i class="far fa-trash-alt"></i></a></td>

                        </tr>
                </tbody>

            <?php
                    }
            ?>
            <tr>
                <td><a href="/jobs/admin_edit/"><i class="fas fa-plus"></i></a></td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
            <tr>
            </table>
            <br>
        </div>
    </div>
</div>
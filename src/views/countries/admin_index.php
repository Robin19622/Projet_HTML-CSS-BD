<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les countries </h1>
            <br>
            <table class="table table-hover  table-sm">
                <thead>
                    <tr class="bg-danger">
                        <th scope="col">Identifiant</th>
                        <th scope="col">Names</th>

                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($countries as $c) {
                    ?>
                        <tr>
                            <td><?= $c->id ?></td>
                            <td><a class="nav-link text-dark" href="/countries/view/<?= $c->id ?>"><?= $c->COUNTRIES_NAMES ?></a></td>

                            <td><a href="/countries/admin_edit/<?= $c->id ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="/countries/admin_delete/<?= $c->id ?>" onclick="return confirm('Voulez vous vraiment supprimer cette employees?');"><i class="far fa-trash-alt"></i></a></td>

                        </tr>
                </tbody>

            <?php
                    }
            ?>
            <tr>
                <td><a href="/countries/admin_edit/"><i class="fas fa-plus"></i></a></td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
            <tr>
            </table>
            <br>
        </div>
    </div>
</div>
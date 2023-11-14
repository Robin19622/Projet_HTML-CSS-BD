<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les catégories </h1>
            <br>
            <table class="table table-hover  table-sm">
                <thead>
                    <tr class="bg-danger">
                        <th scope="col">identifiant</th>
                        <th scope="col">Catégorie</th>

                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($cats as $c) {
                    ?>
                        <tr>
                            <td><?= $c->id ?></td>
                            <td><a class="nav-link text-dark" href="/<?= WEBROOT2 ?>/categorys/view/<?= $c->id ?>"><?= $c->Nom ?></a></td>

                            <td><a href="/<?= WEBROOT2 ?>/categorys/admin_edit/<?= $c->id ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="/<?= WEBROOT2 ?>/categorys/admin_delete/<?= $c->id ?>" onclick="return confirm('Voulez vous vraiment supprimer cette catégorie?');"><i class="far fa-trash-alt"></i></a></td>

                        </tr>
                </tbody>

            <?php
                    }
            ?>
            <tr>
                <td><a href="/<?= WEBROOT2 ?>/categorys/admin_edit/"><i class="fas fa-plus"></i></a></td>
                <td>...</td>

                <td>...</td>
                <td>...</td>
            <tr>
            </table>
            <br>

        </div>

    </div>
</div>
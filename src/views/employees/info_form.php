<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col">
            <br>
            <h1> Les informations sur l'employé : <?= $employee->LAST_NAME ?> </h1>
            <br>

            <div class="d-inline-block">
                <a href="/employees/admin_index" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
            </div>
            <br>
            <table class="table">
                <thead>
                <tr class="bg-danger">
                    <th scope="col">Identifiant</th>
                    <th scope="col">Nom </th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Poste</th>
                    <th scope="col">Departement</th>
                    <th scope="col" style="width: 150px;">Modifier</th>
                    <th scope="col" style="width: 150px;">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $employee->id ?></td>
                        <td><a><?= $employee->LAST_NAME ?></a></td>
                        <td><a><?= $employee->FIRST_NAME ?></a></td>
                        <td><a><?= $job->JOB_TITLE ?></a></td>
                        <td><a><?= $department->DEPARTMENT_NAME ?></a></td>
                        <td><a href="/employees/admin_edit/<?= $employee->id ?>"><i class="fas fa-edit"></i></a></td>
                        <td><a href="/employees/admin_delete/<?= $employee->id ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet employé?');"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const sortableColumns = document.querySelectorAll('.sortable');

        searchInput.addEventListener('input', filterTable);

        sortableColumns.forEach(column => {
            column.addEventListener('click', () => sortTable(column));
        });

        function filterTable() {
            const searchText = searchInput.value.toLowerCase();

            const rows = document.querySelectorAll('tbody tr');

            rows.forEach((row) => {
                const idText = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                const lastNameText = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

                const searchMatch = idText.includes(searchText) || lastNameText.includes(searchText);

                if (searchMatch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }


            document.querySelector('tbody').innerHTML = '';
            sortedRows.forEach(row => document.querySelector('tbody').appendChild(row));

            // Reset order attribute for other columns
            sortableColumns.forEach(col => col.removeAttribute('data-order'));

            // Set order attribute for the clicked column
            column.setAttribute('data-order', sortOrder);

            // Reset sort icon for other columns
            sortableColumns.forEach(col => col.querySelector('i').classList.remove('fa-sort-up', 'fa-sort-down'));

            // Set sort icon for the clicked column
            column.querySelector('i').classList.add(sortOrder === 'asc' ? 'fa-sort-up' : 'fa-sort-down');
        }
    });
</script>


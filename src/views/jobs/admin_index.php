<div class="container-fluid !direction !spacing">
    <div class="row">
        <div class="col mt-3">
            <h1> Les postes </h1>
            <div class="mb-5 mt-5  d-flex justify-content-end">
                <div class="col-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="search" id="searchInput" class="form-control form-control-sm" placeholder="Rechercher">
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr class="bg-danger">
                    <th scope="col" class="sortable">Identifiant <i class="fas fa-sort"></i></th>
                    <th scope="col" class="sortable">Titre <i class="fas fa-sort"></i></th>
                    <th scope="col" style="width: 150px;">Modifier</th>
                    <th scope="col" style="width: 150px;">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($jobs as $j) { ?>
                    <tr>
                        <td><?= $j->id ?></td>
                        <td><a class="nav-link text-dark" href="/jobs/view/<?= $j->id ?>"><?= $j->JOB_TITLE ?></a></td>
                        <td><a href="/jobs/admin_edit/<?= $j->id ?>"><i class="fas fa-edit"></i></a></td>
                        <td><a href="/jobs/admin_delete/<?= $j->id ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce poste?');"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td><a href="/jobs/admin_edit/"><i class="fas fa-plus"></i></a></td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
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
                const jobTitleText = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

                const searchMatch = idText.includes(searchText) || jobTitleText.includes(searchText);

                if (searchMatch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function sortTable(column) {
            const columnIndex = column.cellIndex + 1;
            const sortOrder = column.getAttribute('data-order') === 'asc' ? 'desc' : 'asc';

            const rows = Array.from(document.querySelectorAll('tbody tr'));
            const sortedRows = rows.sort((a, b) => {
                const aValue = a.querySelector(`td:nth-child(${columnIndex})`).textContent.toLowerCase();
                const bValue = b.querySelector(`td:nth-child(${columnIndex})`).textContent.toLowerCase();

                if (sortOrder === 'asc') {
                    return aValue.localeCompare(bValue);
                } else {
                    return bValue.localeCompare(aValue);
                }
            });

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

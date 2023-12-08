<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1>Bienvenue sur l'outil de gestion des employés</h1>
            <br>
            <h5>Vous êtes actuellement en tant que visiteur car vous n'êtes pas connecté</h5>
            <p>Le mode non connecté permet de voir les différentes informations liées aux employés sans pouvoir les modifier.</p>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h3>Vue d'ensemble</h3>
        </div>
        
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Employés</div>
                <div class="card-body">
                    <h5 class="card-title">Nombre total d'employés</h5>
                    <p class="card-text"><?php echo $count_employees[0]->nb_employees; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Pays</div>
                <div class="card-body">
                    <h5 class="card-title">Nombre total de pays</h5>
                    <p class="card-text"><?php echo $count_countries[0]->total_countries; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Locations</div>
                <div class="card-body">
                    <h5 class="card-title">Nombre total de localisations</h5>
                    <p class="card-text"><?php echo $count_locations[0]->total_locations; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.1);">
                <div class="card-header" style="background-color: #6c757d; color: white; border-bottom: 1px solid #5a6268;">
                    <h3 class="mb-0">Répartition des employés par département</h3>
                </div>
                <div class="card-body" style="background-color: #f8f9fa;">
                    <table class="table table-responsive-sm table-striped table-hover">
                        <thead style="background-color: #e9ecef;">
                            <tr>
                                <th style="border-bottom: 2px solid #dee2e6;">Département</th>
                                <th style="border-bottom: 2px solid #dee2e6;">Nombre d'employés</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($departmentCounts as $dept): ?>
                                <tr>
                                    <td style="background-color: #fff;"><?php echo htmlspecialchars($dept->DEPARTMENT_NAME); ?></td>
                                    <td style="background-color: #fff;"><?php echo htmlspecialchars($dept->employee_count); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

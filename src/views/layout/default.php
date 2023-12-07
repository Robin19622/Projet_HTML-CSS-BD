<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des employés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="icon" href="../../webroot/img/database.png" type="image/png">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/home">
        Gestion RH
      </a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" href="/employees">Employés</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/jobs">Postes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/countries">Pays</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/departements">Départements</a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="/locations">Locations </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/jobhistorys">Historiques des postes </a>
            </li>
        </ul>
        <form class='d-flex' method='POST' action='/users'>
          <button class='btn btn-outline-success' type='submit'>Connexion</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <?php
      echo $this->Session->flash();

      echo $content_for_layout;
    ?>
  </div>

  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="container">
      <p class="text-center text-muted">© 2023 Projet gestion des ressources humaines</p>
      <p class="text-center text-muted">Développé par Robin Replat, Jules Digonnet et Alexis Macle</p>
    </div>
  </footer>

  <!-- Bootstrap JS, Popper.js, and jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

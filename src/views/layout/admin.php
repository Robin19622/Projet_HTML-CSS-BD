<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Back office </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/users">back office </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/employees/admin_index">Employés</a>
          </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/jobs/admin_index">Postes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/countries/admin_index">Pays</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/departements/admin_index">Départements</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/locations/admin_index">Locations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/jobhistorys/admin_index">Historique des postes</a>
            </li>
        </ul>
          <form class='d-flex' method='POST' action='/users/logout'>
              <button class='btn btn-outline-success' type='submit'>Se deconnecter</button>
          </form>
  </nav>
  <div class=" container ">
    <div class="row">
      <div class="col">
        <?php echo $this->Session->flash() ?>
      </div>
    </div>
  </div>
  <div class="container">
    <?php echo $content_for_layout; ?>
  </div>

  <footer class="container py-5">

  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
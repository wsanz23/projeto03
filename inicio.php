<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
    <title>DriveELW - Locadora de Carros</title>



    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
        >

<script>
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
</script>

</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">
            <i class="bi bi-car-front-fill text-primary"></i>
            AutoDrive
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menuPrincipal"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                        Início
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="clientes.php">
                        Clientes
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="carros.php">
                        Carros
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="locacoes.php">
                        Locações
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>

 <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="jeepcompass.png" class="d-block w-100 rounded-4" alt="Jeep Compass">
        </div>

        <div class="carousel-item">
            <img src="corolla.png" class="d-block w-100 rounded-4" alt="Toyota Corolla">
        </div>

        <div class="carousel-item">
            <img src="hyundai.png" class="d-block w-100 rounded-4" alt="Toyota Hilux">
        </div>

    </div>

    <button class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleDark"
            data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Anterior</span>
    </button>

    <button class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleDark"
            data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Próximo</span>
    </button>

</div>


<div class="container">
  <div class="row">

    <div class="col-md-6">
      <div class="card">
          <div class="card-body">
          <img src="jeepcompass.png" class="card-img" alt="Jeep Compass">
          <h5 class="mt-2">Jeep Compass 2023</h5>
          <small class="fg-3">Last updated 3 year</small>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <img src="hyundai.png" class="card-img" alt="Hyundai HB20">
          <h5 class="mt-2">Hyundai HB20 2022</h5>
           <small class="fg-3">Last updated 4 year</small>
        </div>
      </div>
    </div>

  </div>
</div>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <footer class="bg-dark text-white text-center py-4">
        <p class="mb-0">
            DriveELW - Projeto ETEC
        </p>
    </footer>

</body>

</html>

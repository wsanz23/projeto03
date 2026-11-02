<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DriveELW - Locadora de Carros</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"

</script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

    >
</head>

<body class="bg-light">

    <<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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

    <main class="container py-5">

        <section class="bg-primary text-white rounded-4 p-5 shadow-sm">
            <div class="row align-items-center">

                <div class="col-md-8">
                    <h1 class="display-5 fw-bold">
                        Alugue seu carro com facilidade
                    </h1>

                    <p class="lead">
                        Sistema de controle para clientes, carros e locações.
                    </p>

                    <a href="#resumo" class="btn btn-light">
                        Conhecer o sistema
                    </a>
                </div>

                <div class="col-md-4 text-center mt-4 mt-md-0">
                    <i class="bi bi-car-front-fill display-1"></i>
                </div>

            </div>
        </section>

        <section id="resumo" class="row g-4 mt-4">

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-people-fill text-primary fs-1"></i>

                        <h2 class="h4 mt-3">
                            Clientes
                        </h2>

                        <p class="text-muted">
                            Cadastre e consulte os clientes da locadora.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-car-front text-success fs-1"></i>

                        <h2 class="h4 mt-3">
                            Carros
                        </h2>

                        <p class="text-muted">
                            Controle os carros disponíveis para locação.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-check text-warning fs-1"></i>

                        <h2 class="h4 mt-3">
                            Locações
                        </h2>

                        <p class="text-muted">
                            Registre as retiradas e devoluções dos carros.
                        </p>
                    </div>
                </div>
            </div>

        </section>

    </main>

    <footer class="bg-dark text-white text-center py-4">
        <p class="mb-0">
            DriveELW - Projeto ETEC
        </p>
    </footer>

</body>

</html>

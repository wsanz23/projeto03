<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clientes - DriveELW</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand fw-bold" href="index.php">
                <i class="bi bi-car-front-fill text-primary"></i>
                ELW
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
                        <a class="nav-link" href="index.php">
                            Início
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="clientes.php">
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

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 mb-1">Clientes</h1>
                <p class="text-muted mb-0">
                    Cadastro de clientes da locadora
                </p>
            </div>

            <i class="bi bi-people-fill text-primary fs-1"></i>
        </div>

        <div class="row g-4">

            <div class="col-lg-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-person-plus-fill me-2"></i>
                        Novo cliente
                    </div>

                    <div class="card-body">
                        <form>

                            <div class="mb-3">
                                <label for="nome" class="form-label">
                                    Nome completo
                                </label>

                                <input
                                    type="text"
                                    id="nome"
                                    name="nome"
                                    class="form-control"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="cpf" class="form-label">
                                    CPF
                                </label>

                                <input
                                    type="text"
                                    id="cpf"
                                    name="cpf"
                                    class="form-control"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="cnh" class="form-label">
                                    CNH
                                </label>

                                <input
                                    type="text"
                                    id="cnh"
                                    name="cnh"
                                    class="form-control"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="telefone" class="form-label">
                                    Telefone
                                </label>

                                <input
                                    type="tel"
                                    id="telefone"
                                    name="telefone"
                                    class="form-control"
                                >
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    E-mail
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control"
                                >
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-save me-1"></i>
                                Salvar cliente
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-header">
                        <i class="bi bi-list-ul me-2"></i>
                        Clientes cadastrados
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        Nenhum cliente cadastrado.
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <footer class="bg-dark text-white text-center py-4">
        <p class="mb-0">
            AutoDrive - Projeto Integrado ETEC
        </p>
    </footer>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>

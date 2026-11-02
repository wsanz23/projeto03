<?php

require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marca = trim($_POST['marca']);
    $modelo = trim($_POST['modelo']);
    $placa = trim($_POST['placa']);
    $categoria = trim($_POST['categoria']);
    $valor_diaria = (float) $_POST['valor_diaria'];
    $status = trim($_POST['status']);

    $comando = $conexao->prepare(
        'INSERT INTO carro
        (marca, modelo, placa, categoria, valor_diaria, status)
        VALUES (?, ?, ?, ?, ?, ?)'
    );

    $comando->execute([
        $marca,
        $modelo,
        $placa,
        $categoria,
        $valor_diaria,
        $status
    ]);

    header('Location: carros.php');
    exit;
}

$comando = $conexao->query(
    'SELECT * FROM carro ORDER BY marca, modelo'
);

$carros = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Carros - DriveELW
    </title>

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
                AutoDrive
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuPrincipal"
                aria-controls="menuPrincipal"
                aria-expanded="false"
                aria-label="Abrir menu"
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
                        <a class="nav-link" href="clientes.php">
                            Clientes
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="carros.php">
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
                <h1 class="h2 mb-1">Carros</h1>
                <p class="text-muted mb-0">
                    Cadastro e controle dos carros da locadora
                </p>
            </div>

            <i class="bi bi-car-front-fill text-primary fs-1"></i>
        </div>

        <div class="row g-4">

            <div class="col-lg-5">
                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-plus-circle me-2"></i>
                        Cadastrar carro
                    </div>

                    <div class="card-body">

                        <form method="post">

                            <div class="mb-3">
                                <label for="marca" class="form-label">
                                    Marca
                                </label>

                                <input
                                    type="text"
                                    id="marca"
                                    name="marca"
                                    class="form-control"
                                    placeholder="Ex.: Toyota"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="modelo" class="form-label">
                                    Modelo
                                </label>

                                <input
                                    type="text"
                                    id="modelo"
                                    name="modelo"
                                    class="form-control"
                                    placeholder="Ex.: Corolla XEi"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="placa" class="form-label">
                                    Placa
                                </label>

                                <input
                                    type="text"
                                    id="placa"
                                    name="placa"
                                    class="form-control"
                                    placeholder="Ex.: ABC1D23"
                                    maxlength="7"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="categoria" class="form-label">
                                    Categoria
                                </label>

                                <select
                                    id="categoria"
                                    name="categoria"
                                    class="form-select"
                                    required
                                >
                                    <option value="">
                                        Selecione uma categoria
                                    </option>

                                    <option value="Hatch">
                                        Hatch
                                    </option>

                                    <option value="Sedan">
                                        Sedan
                                    </option>

                                    <option value="SUV">
                                        SUV
                                    </option>

                                    <option value="Pickup">
                                        Pickup
                                    </option>

                                    <option value="Utilitario">
                                        Utilitário
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="valor_diaria" class="form-label">
                                    Valor da diária
                                </label>

                                <div class="input-group">
                                    <span class="input-group-text">
                                        R$
                                    </span>

                                    <input
                                        type="number"
                                        id="valor_diaria"
                                        name="valor_diaria"
                                        class="form-control"
                                        placeholder="0,00"
                                        min="0"
                                        step="0.01"
                                        required
                                    >
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="status" class="form-label">
                                    Status
                                </label>

                                <select
                                    id="status"
                                    name="status"
                                    class="form-select"
                                    required
                                >
                                    <option value="disponivel">
                                        Disponível
                                    </option>

                                    <option value="alugado">
                                        Alugado
                                    </option>

                                    <option value="manutencao">
                                        Em manutenção
                                    </option>
                                </select>
                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary w-100"
                            >
                                <i class="bi bi-save me-1"></i>
                                Salvar carro
                            </button>

                        </form>

                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>
                            <i class="bi bi-list-ul me-2"></i>
                            Carros cadastrados
                        </span>

                        <span class="badge bg-primary">
                         <?= count($carros) ?> carros
                    </span>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>Carro</th>
                                    <th>Placa</th>
                                    <th>Categoria</th>
                                    <th>Diária</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>

                            <tbody>

    <?php if (count($carros) === 0): ?>

        <tr>
            <td colspan="6" class="text-center text-muted py-4">
                Nenhum carro cadastrado.
            </td>
        </tr>

    <?php else: ?>

        <?php foreach ($carros as $carro): ?>

            <tr>
                <td>
                    <?= htmlspecialchars(
                        $carro['marca'] . ' ' . $carro['modelo'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </td>

                <td>
                    <?= htmlspecialchars(
                        $carro['placa'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </td>

                <td>
                    <?= htmlspecialchars(
                        $carro['categoria'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </td>

                <td>
                    R$
                    <?= number_format(
                        $carro['valor_diaria'],
                        2,
                        ',',
                        '.'
                    ) ?>
                </td>

                <td>
                    <?php if ($carro['status'] === 'disponivel'): ?>

                        <span class="badge bg-success">
                            Disponível
                        </span>

                    <?php elseif ($carro['status'] === 'alugado'): ?>

                        <span class="badge bg-danger">
                            Alugado
                        </span>

                    <?php else: ?>

                        <span class="badge bg-warning text-dark">
                            Em manutenção
                        </span>

                    <?php endif; ?>
                </td>

                <td>
                    <button class="btn btn-sm btn-outline-primary">
                        Editar
                    </button>

                    <button class="btn btn-sm btn-outline-danger">
                        Excluir
                    </button>
                </td>
            </tr>

        <?php endforeach; ?>

    <?php endif; ?>

</tbody>


                        </table>
                    </div>

                </div>
            </div>

        </div>

    </main>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p class="mb-0">
            AutoDrive - Projeto Integrado ETEC
        </p>
    </footer>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>

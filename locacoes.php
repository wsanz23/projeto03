<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Locações - DriveELW</title>

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
                        <a class="nav-link" href="carros.php">
                            Carros
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="locacoes.php">
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
                <h1 class="h2 mb-1">Locações</h1>

                <p class="text-muted mb-0">
                    Controle de retiradas e devoluções de carros
                </p>
            </div>

            <i class="bi bi-calendar-check-fill text-primary fs-1"></i>
        </div>

        <div class="row g-4">

            <div class="col-lg-5">
                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-plus-circle me-2"></i>
                        Nova locação
                    </div>

                    <div class="card-body">

                        <form method="post">

                            <div class="mb-3">
                                <label for="cliente_id" class="form-label">
                                    Cliente
                                </label>

                                <select
                                    id="cliente_id"
                                    name="cliente_id"
                                    class="form-select"
                                    required
                                >
                                    <option value="">
                                        Selecione um cliente
                                    </option>

                                    <option value="1">
                                        Exemplo - João da Silva
                                    </option>

                                    <option value="2">
                                        Exemplo - Maria Oliveira
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="carro_id" class="form-label">
                                    Carro
                                </label>

                                <select
                                    id="carro_id"
                                    name="carro_id"
                                    class="form-select"
                                    required
                                >
                                    <option
                                        value=""
                                        data-valor="0"
                                    >
                                        Selecione um carro
                                    </option>

                                    <option
                                        value="1"
                                        data-valor="120"
                                    >
                                        Toyota Corolla - R$ 120,00 por dia
                                    </option>

                                    <option
                                        value="2"
                                        data-valor="150"
                                    >
                                        Hyundai HB20 - R$ 150,00 por dia
                                    </option>

                                    <option
                                        value="3"
                                        data-valor="200"
                                    >
                                        Jeep Compass - R$ 200,00 por dia
                                    </option>
                                </select>
                            </div>

                            <div class="row g-3 mb-3">

                                <div class="col-md-6">
                                    <label
                                        for="data_inicio"
                                        class="form-label"
                                    >
                                        Data de retirada
                                    </label>

                                    <input
                                        type="date"
                                        id="data_inicio"
                                        name="data_inicio"
                                        class="form-control"
                                        required
                                    >
                                </div>

                                <div class="col-md-6">
                                    <label
                                        for="data_fim"
                                        class="form-label"
                                    >
                                        Data de devolução
                                    </label>

                                    <input
                                        type="date"
                                        id="data_fim"
                                        name="data_fim"
                                        class="form-control"
                                        required
                                    >
                                </div>

                            </div>

                            <div class="mb-4">
                                <label
                                    for="valor_total"
                                    class="form-label"
                                >
                                    Valor total
                                </label>

                                <div class="input-group">
                                    <span class="input-group-text">
                                        R$
                                    </span>

                                    <input
                                        type="text"
                                        id="valor_total"
                                        name="valor_total"
                                        class="form-control"
                                        value="0,00"
                                        readonly
                                    >
                                </div>

                                <div class="form-text">
                                    O valor será calculado pela quantidade
                                    de dias e pelo valor da diária.
                                </div>
                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary w-100"
                            >
                                <i class="bi bi-save me-1"></i>
                                Registrar locação
                            </button>

                        </form>

                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">

                    <div
                        class="card-header d-flex justify-content-between align-items-center"
                    >
                        <span>
                            <i class="bi bi-list-ul me-2"></i>
                            Locações cadastradas
                        </span>

                        <span class="badge bg-primary">
                            0 locações
                        </span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>Cliente</th>
                                    <th>Carro</th>
                                    <th>Retirada</th>
                                    <th>Devolução</th>
                                    <th>Valor total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td
                                        colspan="6"
                                        class="text-center text-muted py-4"
                                    >
                                        Nenhuma locação cadastrada.
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>

    </main>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p class="mb-0">
            DriveELW
        </p>
    </footer>

    <script>
        const carroSelecionado = document.getElementById('carro_id');
        const dataInicio = document.getElementById('data_inicio');
        const dataFim = document.getElementById('data_fim');
        const valorTotal = document.getElementById('valor_total');

        function calcularValorTotal() {
            const opcaoCarro = carroSelecionado.options[
                carroSelecionado.selectedIndex
            ];

            const valorDiaria = Number(
                opcaoCarro.getAttribute('data-valor')
            ) || 0;

            const dataInicial = new Date(dataInicio.value);
            const dataFinal = new Date(dataFim.value);

            if (
                !dataInicio.value ||
                !dataFim.value ||
                dataFinal < dataInicial
            ) {
                valorTotal.value = '0,00';
                return;
            }

            const diferenca = dataFinal - dataInicial;
            const quantidadeDias = Math.max(
                1,
                Math.ceil(diferenca / (1000 * 60 * 60 * 24))
            );

            const total = quantidadeDias * valorDiaria;

            valorTotal.value = total.toFixed(2).replace('.', ',');
        }

        carroSelecionado.addEventListener(
            'change',
            calcularValorTotal
        );

        dataInicio.addEventListener(
            'change',
            calcularValorTotal
        );

        dataFim.addEventListener(
            'change',
            calcularValorTotal
        );
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>

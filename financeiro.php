<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Sistema Financeiro</title>
    <link rel="stylesheet" href="style1.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<header>
    <h1>Sistema Financeiro</h1>
    <p>Painel de controle financeiro da empresa</p>
</header>

<nav>
    <a href="financeiro.php">Financeiro</a>
    <a href="contabil.php">Contábil</a>
    <a href="estoque.php">Estoque</a>
    <a href="vendas.php">Vendas</a>
</nav>

<main>

    <section class="cards">
        <article>
            <span>Saldo total</span>
            <strong><?= dinheiro($saldo) ?></strong>
        </article>

        <article>
            <span>Total de entradas</span>
            <strong><?= dinheiro($entradas) ?></strong>
        </article>

        <article>
            <span>Total de saídas</span>
            <strong><?= dinheiro($saidas) ?></strong>
        </article>
    </section>

    <section class="cards">
        <article>
            <span>Entradas do mês</span>
            <strong><?= dinheiro($mes['entradas']) ?></strong>
        </article>

        <article>
            <span>Saídas do mês</span>
            <strong><?= dinheiro($mes['saidas']) ?></strong>
        </article>

        <article>
            <span>Saldo do mês</span>
            <strong>
                <?= dinheiro(
                    $mes['entradas'] - $mes['saidas']
                ) ?>
            </strong>
        </article>
    </section>

    <section class="panel">
        <h2>Registrar movimentação</h2>

        <form method="post" class="grid">

            <label>Data
                <input type="date"
                       name="data"
                       value="<?= date('Y-m-d') ?>"
                       required>
            </label>

            <label>Descrição
                <input type="text"
                       name="descricao"
                       placeholder="Ex.: pagamento de cliente"
                       maxlength="120"
                       required>
            </label>

            <label>Categoria
                <select name="categoria" required>
                    <option value="Vendas">Vendas</option>
                    <option value="Salários">Salários</option>
                    <option value="Aluguel">Aluguel</option>
                    <option value="Fornecedores">Fornecedores</option>
                    <option value="Impostos">Impostos</option>
                    <option value="Serviços">Serviços</option>
                    <option value="Outros">Outros</option>
                </select>
            </label>

            <label>Tipo
                <select name="tipo" required>
                    <option value="Entrada">Entrada</option>
                    <option value="Saída">Saída</option>
                </select>
            </label>

            <label>Valor (R$)
                <input type="number"
                       name="valor"
                       min="0.01"
                       step="0.01"
                       required>
            </label>

            <button type="submit" name="salvar">
                Salvar movimentação
            </button>

        </form>
    </section>

    <section class="panel">
        <h2>Gráfico financeiro</h2>
        <canvas id="graficoFinanceiro"></canvas>
    </section>

    <section class="panel">
        <h2>Últimas movimentações</h2>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($rows as $r): ?>
                    <tr>
                        <td><?= h($r['data']) ?></td>
                        <td><?= h($r['descricao']) ?></td>
                        <td><?= h($r['categoria']) ?></td>
                        <td><?= h($r['tipo']) ?></td>
                        <td><?= dinheiro($r['valor']) ?></td>
                        <td>
                            <a class="delete"
                               href="?excluir=<?= (int)$r['id'] ?>"
                               onclick="return confirm(
                                   'Excluir esta movimentação?'
                               )">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php if (!$rows): ?>
                    <tr>
                        <td colspan="6">
                            Nenhuma movimentação cadastrada.
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

</main>

<footer>Sistema Financeiro</footer>

<script>
const grafico = document.getElementById(
    'graficoFinanceiro'
);

new Chart(grafico, {
    type: 'bar',
    data: {
        labels: ['Entradas', 'Saídas'],
        datasets: [{
            label: 'Valores em reais',
            data: [
                <?= json_encode($entradas) ?>,
                <?= json_encode($saidas) ?>
            ],
            backgroundColor: ['#31845b', '#c94c4c'],
            borderRadius: 6
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Vendas</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

<header>
    <h1>Sistema de Vendas</h1>
    <p>Registro e acompanhamento de vendas</p>
</header>

<nav>
    <a href="contabil.php">Contábil</a>
    <a href="estoque.php">Estoque</a>
    <a href="vendas.php">Vendas</a>
</nav>

<main>
    <section class="cards">
        <article>
            <span>Total vendido</span>
            <strong><?= dinheiro($total) ?></strong>
        </article>
        <article>
            <span>Vendido hoje</span>
            <strong><?= dinheiro($hoje) ?></strong>
        </article>
        <article>
            <span>Unidades vendidas</span>
            <strong><?= (int)$quantidadeTotal ?></strong>
        </article>
    </section>

    <section class="panel">
        <h2>Registrar venda</h2>

        <form method="post" class="grid">
            <label>Data
                <input type="date" name="data"
                       value="<?= date('Y-m-d') ?>" required>
            </label>

            <label>Cliente
                <input name="cliente" required>
            </label>

            <label>Produto
                <input name="produto" required>
            </label>

            <label>Quantidade
                <input type="number" name="quantidade"
                       min="1" value="1" required>
            </label>

            <label>Valor unitário (R$)
                <input type="number" name="valor_unitario"
                       min="0" step="0.01" required>
            </label>

            <label>Forma de pagamento
                <select name="pagamento">
                    <option>Pix</option>
                    <option>Dinheiro</option>
                    <option>Cartão de débito</option>
                    <option>Cartão de crédito</option>
                    <option>Boleto</option>
                </select>
            </label>

            <button name="salvar">Registrar venda</button>
        </form>
    </section>

    <section class="panel">
        <h2>Histórico de vendas</h2>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Valor unitário</th>
                        <th>Total</th>
                        <th>Pagamento</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($rows as $r): ?>
                    <tr>
                        <td><?= h($r['data']) ?></td>
                        <td><?= h($r['cliente']) ?></td>
                        <td><?= h($r['produto']) ?></td>
                        <td><?= (int)$r['quantidade'] ?></td>
                        <td><?= dinheiro($r['valor_unitario']) ?></td>
                        <td><?= dinheiro($r['total']) ?></td>
                        <td><?= h($r['pagamento']) ?></td>
                        <td>
                            <a class="delete"
                               href="?excluir=<?= (int)$r['id'] ?>"
                               onclick="return confirm('Excluir venda?')">
                               Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php if (!$rows): ?>
                    <tr>
                        <td colspan="8">Nenhuma venda registrada.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<footer>Sistema de Vendas</footer>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Contábil</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

<header>
    <h1>Sistema Contábil</h1>
    <p>Controle de receitas, despesas e lançamentos</p>
</header>

<nav>
    <a href="contabil.php">Contábil</a>
    <a href="estoque.php">Estoque</a>
    <a href="vendas.php">Vendas</a>
</nav>

<main>
    <section class="cards">
        <article>
            <span>Total de receitas</span>
            <strong><?= dinheiro($receitas) ?></strong>
        </article>
        <article>
            <span>Total de despesas</span>
            <strong><?= dinheiro($despesas) ?></strong>
        </article>
        <article>
            <span>Saldo</span>
            <strong><?= dinheiro($receitas - $despesas) ?></strong>
        </article>
    </section>

    <section class="panel">
        <h2>Novo lançamento</h2>

        <form method="post" class="grid">
            <label>Data
                <input type="date" name="data"
                       value="<?= date('Y-m-d') ?>" required>
            </label>

            <label>Descrição
                <input name="descricao" required>
            </label>

            <label>Categoria
                <input name="categoria" required>
            </label>

            <label>Tipo
                <select name="tipo">
                    <option value="Receita">Receita</option>
                    <option value="Despesa">Despesa</option>
                </select>
            </label>

            <label>Valor (R$)
                <input type="number" name="valor"
                       min="0.01" step="0.01" required>
            </label>

            <button name="salvar">Salvar lançamento</button>
        </form>
    </section>

    <section class="panel">
        <h2>Lançamentos recentes</h2>

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
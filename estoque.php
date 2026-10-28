
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Estoque</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

<header>
    <h1>Sistema de Estoque</h1>
    <p>Cadastro e controle de produtos</p>
</header>

<nav>
    <a href="contabil.php">Contábil</a>
    <a href="estoque.php">Estoque</a>
    <a href="vendas.php">Vendas</a>
</nav>

<main>
    <section class="cards">
        <article>
            <span>Produtos cadastrados</span>
            <strong><?= count($rows) ?></strong>
        </article>
        <article>
            <span>Unidades em estoque</span>
            <strong><?= (int)$total ?></strong>
        </article>
        <article>
            <span>Produtos com estoque baixo</span>
            <strong><?= (int)$baixo ?></strong>
        </article>
    </section>

    <section class="panel">
        <h2>Cadastrar produto</h2>

        <form method="post" class="grid">
            <label>Nome do produto
                <input name="nome" required>
            </label>

            <label>Código
                <input name="codigo" required>
            </label>

            <label>Quantidade inicial
                <input type="number" name="quantidade"
                       min="0" value="0" required>
            </label>

            <label>Estoque mínimo
                <input type="number" name="minimo"
                       min="0" value="5" required>
            </label>

            <label>Custo unitário (R$)
                <input type="number" name="custo"
                       min="0" step="0.01" value="0" required>
            </label>

            <button name="salvar">Cadastrar produto</button>
        </form>
    </section>

    <section class="panel">
        <h2>Produtos cadastrados</h2>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Código</th>
                        <th>Quantidade</th>
                        <th>Mínimo</th>
                        <th>Custo</th>
                        <th>Entrada</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($rows as $r): ?>
                    <tr>
                        <td><?= h($r['nome']) ?></td>
                        <td><?= h($r['codigo']) ?></td>
                        <td>
                            <?= (int)$r['quantidade'] ?>
                            <?php if ($r['quantidade'] <= $r['minimo']): ?>
                                <span class="warning">Estoque baixo</span>
                            <?php endif; ?>
                        </td>
                        <td><?= (int)$r['minimo'] ?></td>
                        <td><?= dinheiro($r['custo']) ?></td>
                        <td>
                            <form method="post" class="inline-form">
                                <input type="hidden" name="produto_id"
                                       value="<?= (int)$r['id'] ?>">
                                <input type="number" name="quantidade_entrada"
                                       min="1" value="1" required>
                                <button name="entrada">Adicionar</button>
                            </form>
                        </td>
                        <td>
                            <a class="delete"
                               href="?excluir=<?= (int)$r['id'] ?>"
                               onclick="return confirm('Excluir produto?')">
                               Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php if (!$rows): ?>
                    <tr>
                        <td colspan="7">Nenhum produto cadastrado.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<footer>Sistema de Estoque</footer>
</body>
</html>

<?php
$db = new PDO('sqlite:' . __DIR__ . '/estoque.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec("CREATE TABLE IF NOT EXISTS produtos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    codigo TEXT NOT NULL,
    quantidade INTEGER NOT NULL DEFAULT 0,
    minimo INTEGER NOT NULL DEFAULT 0,
    custo REAL NOT NULL DEFAULT 0
)");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
    $stmt = $db->prepare(
        "INSERT INTO produtos
        (nome, codigo, quantidade, minimo, custo)
        VALUES (?, ?, ?, ?, ?)"
    );

    $stmt->execute([
        trim($_POST['nome']),
        trim($_POST['codigo']),
        max(0, (int)$_POST['quantidade']),
        max(0, (int)$_POST['minimo']),
        max(0, (float)$_POST['custo'])
    ]);

    header('Location: estoque.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['entrada'])) {
    $stmt = $db->prepare(
        "UPDATE produtos
         SET quantidade = quantidade + ?
         WHERE id = ?"
    );

    $stmt->execute([
        max(1, (int)$_POST['quantidade_entrada']),
        (int)$_POST['produto_id']
    ]);

    header('Location: estoque.php');
    exit;
}

if (isset($_GET['excluir'])) {
    $stmt = $db->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->execute([(int)$_GET['excluir']]);
    header('Location: estoque.php');
    exit;
}

$rows = $db->query(
    "SELECT * FROM produtos ORDER BY nome"
)->fetchAll(PDO::FETCH_ASSOC);

$total = $db->query(
    "SELECT COALESCE(SUM(quantidade), 0) FROM produtos"
)->fetchColumn();

$baixo = $db->query(
    "SELECT COUNT(*) FROM produtos WHERE quantidade <= minimo"
)->fetchColumn();

function h($valor) {
    return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
}

function dinheiro($valor) {
    return 'R$ ' . number_format((float)$valor, 2, ',', '.');
}
?>
<?php
$db = new PDO('sqlite:' . __DIR__ . '/vendas.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec("CREATE TABLE IF NOT EXISTS vendas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    data TEXT NOT NULL,
    cliente TEXT NOT NULL,
    produto TEXT NOT NULL,
    quantidade INTEGER NOT NULL,
    valor_unitario REAL NOT NULL,
    total REAL NOT NULL,
    pagamento TEXT NOT NULL
)");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
    $quantidade = max(1, (int)$_POST['quantidade']);
    $valor = max(0, (float)$_POST['valor_unitario']);
    $totalVenda = $quantidade * $valor;

    $stmt = $db->prepare(
        "INSERT INTO vendas
        (data, cliente, produto, quantidade,
         valor_unitario, total, pagamento)
        VALUES (?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->execute([
        $_POST['data'],
        trim($_POST['cliente']),
        trim($_POST['produto']),
        $quantidade,
        $valor,
        $totalVenda,
        $_POST['pagamento']
    ]);

    header('Location: vendas.php');
    exit;
}

if (isset($_GET['excluir'])) {
    $stmt = $db->prepare("DELETE FROM vendas WHERE id = ?");
    $stmt->execute([(int)$_GET['excluir']]);
    header('Location: vendas.php');
    exit;
}

$rows = $db->query(
    "SELECT * FROM vendas ORDER BY data DESC, id DESC"
)->fetchAll(PDO::FETCH_ASSOC);

$total = $db->query(
    "SELECT COALESCE(SUM(total), 0) FROM vendas"
)->fetchColumn();

$quantidadeTotal = $db->query(
    "SELECT COALESCE(SUM(quantidade), 0) FROM vendas"
)->fetchColumn();

$hoje = $db->query(
    "SELECT COALESCE(SUM(total), 0)
     FROM vendas WHERE data = date('now', 'localtime')"
)->fetchColumn();

function h($valor) {
    return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
}

function dinheiro($valor) {
    return 'R$ ' . number_format((float)$valor, 2, ',', '.');
}
?>


//financeiro//
<?php
$db = new PDO('sqlite:' . __DIR__ . '/financeiro.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec("CREATE TABLE IF NOT EXISTS movimentacoes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    data TEXT NOT NULL,
    descricao TEXT NOT NULL,
    categoria TEXT NOT NULL,
    tipo TEXT NOT NULL,
    valor REAL NOT NULL
)");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
    $tipo = $_POST['tipo'] ?? '';
    $valor = (float)($_POST['valor'] ?? 0);
    $data = $_POST['data'] ?? '';
    $descricao = trim($_POST['descricao'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');

    if (
        in_array($tipo, ['Entrada', 'Saída'], true) &&
        $valor > 0 &&
        $descricao !== '' &&
        $categoria !== '' &&
        preg_match('/^\d{4}-\d{2}-\d{2}$/', $data)
    ) {
        $stmt = $db->prepare(
            "INSERT INTO movimentacoes
            (data, descricao, categoria, tipo, valor)
            VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $data, $descricao, $categoria, $tipo, $valor
        ]);
    }

    header('Location: financeiro.php');
    exit;
}

if (isset($_GET['excluir'])) {
    $stmt = $db->prepare(
        "DELETE FROM movimentacoes WHERE id = ?"
    );
    $stmt->execute([(int)$_GET['excluir']]);

    header('Location: financeiro.php');
    exit;
}

$entradas = (float)$db->query(
    "SELECT COALESCE(SUM(valor), 0)
     FROM movimentacoes WHERE tipo = 'Entrada'"
)->fetchColumn();

$saidas = (float)$db->query(
    "SELECT COALESCE(SUM(valor), 0)
     FROM movimentacoes WHERE tipo = 'Saída'"
)->fetchColumn();

$saldo = $entradas - $saidas;

$rows = $db->query(
    "SELECT * FROM movimentacoes
     ORDER BY data DESC, id DESC"
)->fetchAll(PDO::FETCH_ASSOC);

$mesAtual = date('Y-m');

$stmt = $db->prepare(
    "SELECT
        COALESCE(SUM(CASE WHEN tipo = 'Entrada'
            THEN valor ELSE 0 END), 0) AS entradas,
        COALESCE(SUM(CASE WHEN tipo = 'Saída'
            THEN valor ELSE 0 END), 0) AS saidas
     FROM movimentacoes
     WHERE substr(data, 1, 7) = ?"
);
$stmt->execute([$mesAtual]);
$mes = $stmt->fetch(PDO::FETCH_ASSOC);

function h($valor) {
    return htmlspecialchars(
        (string)$valor,
        ENT_QUOTES,
        'UTF-8'
    );
}

function dinheiro($valor) {
    return 'R$ ' . number_format(
        (float)$valor, 2, ',', '.'
    );
}

//estoque//

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

//contabil//

<?php
$db = new PDO('sqlite:' . __DIR__ . '/contabil.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec("CREATE TABLE IF NOT EXISTS lancamentos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    data TEXT NOT NULL,
    descricao TEXT NOT NULL,
    categoria TEXT NOT NULL,
    tipo TEXT NOT NULL,
    valor REAL NOT NULL
)");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
    $stmt = $db->prepare(
        "INSERT INTO lancamentos
        (data, descricao, categoria, tipo, valor)
        VALUES (?, ?, ?, ?, ?)"
    );

    $stmt->execute([
        $_POST['data'],
        trim($_POST['descricao']),
        trim($_POST['categoria']),
        $_POST['tipo'],
        (float) $_POST['valor']
    ]);

    header('Location: contabil.php');
    exit;
}

if (isset($_GET['excluir'])) {
    $stmt = $db->prepare("DELETE FROM lancamentos WHERE id = ?");
    $stmt->execute([(int) $_GET['excluir']]);
    header('Location: contabil.php');
    exit;
}

$rows = $db->query(
    "SELECT * FROM lancamentos ORDER BY data DESC, id DESC"
)->fetchAll(PDO::FETCH_ASSOC);

$receitas = $db->query(
    "SELECT COALESCE(SUM(valor), 0)
     FROM lancamentos WHERE tipo = 'Receita'"
)->fetchColumn();

$despesas = $db->query(
    "SELECT COALESCE(SUM(valor), 0)
     FROM lancamentos WHERE tipo = 'Despesa'"
)->fetchColumn();

function h($valor) {
    return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
}

function dinheiro($valor) {
    return 'R$ ' . number_format((float)$valor, 2, ',', '.');
}
?>
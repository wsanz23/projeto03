<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GYM FIT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-sidebar">

    <div class="container login-container">
        <div class="card shadow-lg border-0 p-4 login-card rounded-4">
            
            <div class="text-center mb-4 mt-2">
                <h1 class="display-6 text-brand fw-bold mb-1">GYM FIT</h1>
                <p class="text-muted">Acesso ao painel de gestão</p>
            </div>

          
            
            <form action="sistema.php" method="POST">
                
                <div class="form-floating mb-3">
                    <input type="email" class="form-control focus-ring-brand" id="email" name="email" placeholder="nome@exemplo.com" required>
                    <label for="email" class="text-muted">E-mail do Gestor</label>
                </div>
                
                <div class="form-floating mb-4">
                    <input type="password" class="form-control focus-ring-brand" id="senha" name="senha" placeholder="Senha" required>
                    <label for="senha" class="text-muted">Senha</label>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="lembrar">
                        <label class="form-check-label text-muted small" for="lembrar">
                            Lembrar-me
                        </label>
                    </div>
                    <a href="#" class="text-brand text-decoration-none small fw-bold">Esqueceu a senha?</a>
                </div>

                <button class="btn bg-brand w-100 py-3 fw-bold shadow-sm rounded-3 mb-3" type="submit">
                    Entrar no Sistema
                </button>
                
            </form>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

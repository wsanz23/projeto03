<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYM FIT</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Seu arquivo CSS customizado -->
    <link rel="stylesheet" href="style.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-none d-md-block bg-sidebar vh-100 position-fixed py-4 shadow">
                <h2 class="text-center text-brand mb-4 fw-bold">GYM FIT</h2>
                <ul class="nav flex-column px-3">
                    <li class="nav-item">
                        <a class="nav-link active-brand rounded" href="#">Gráfico</a>
                    </li>
                    <li class="nav-item"><a class="nav-link rounded" href="#">Alunos</a></li>
                    <li class="nav-item"><a class="nav-link rounded" href="#">Financeiro</a></li>
                    <li class="nav-item"><a class="nav-link rounded" href="#">Contábil</a></li>
                    <li class="nav-item"><a class="nav-link rounded" href="#">Vendas</a></li>
                    <li class="nav-item"><a class="nav-link rounded" href="#">Estoque</a></li>
                    <li class="nav-item"><a class="nav-link rounded" href="#">Ajuda</a></li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                
                <!-- Header: Painel -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-4 bg-white p-3 rounded shadow-sm">
                    <div>
                        <h1 class="h3 mb-0 text-dark fw-bold">Painel de Controle</h1>
                        <p class="text-muted mb-0">Bem-vindo de volta, Gestor.</p>
                    </div>
                    <div>
                        <button class="btn bg-brand fw-bold shadow-sm">+ Nova Venda</button>
                    </div>
                </div>

                <!-- Cards Resumo -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="card shadow-sm border-0 border-start border-brand border-left-custom h-100">
                            <div class="card-body">
                                <h6 class="text-muted fw-bold">Alunos Ativos</h6>
                                <h3 class="mb-0 text-dark fw-bold">452</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card shadow-sm border-0 border-start border-primary border-left-custom h-100">
                            <div class="card-body">
                                <h6 class="text-muted fw-bold">Faturamento Mensal</h6>
                                <h3 class="mb-0 text-dark fw-bold">R$ 45.200,00</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card shadow-sm border-0 border-start border-danger border-left-custom h-100">
                            <div class="card-body">
                                <h6 class="text-muted fw-bold">Contas a Pagar (Hoje)</h6>
                                <h3 class="mb-0 text-dark fw-bold">R$ 1.250,00</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card shadow-sm border-0 border-start border-warning border-left-custom h-100">
                            <div class="card-body">
                                <h6 class="text-muted fw-bold">Alertas de Estoque</h6>
                                <h3 class="mb-0 text-dark fw-bold">5 itens</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gráfico e Tabela -->
                <div class="row mb-5">
                    <!-- Gráfico -->
                    <div class="col-lg-8 mb-4">
                        <div class="card shadow-sm border-0 p-4 h-100">
                            <h5 class="text-dark fw-bold mb-4">Faturamento x Despesas (Semestre)</h5>
                            <canvas id="financeiroChart"></canvas>
                        </div>
                    </div>

                    <!-- Tabela -->
                    <div class="col-lg-4 mb-4">
                        <div class="card shadow-sm border-0 p-4 h-100">
                            <h5 class="text-dark fw-bold mb-4">Últimos Acessos/Matrículas</h5>
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Aluno</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>Pessoa 1</td><td class="text-success fw-bold">Ativo</td></tr>
                                        <tr><td>Pessoa 2</td><td class="text-success fw-bold">Ativo</td></tr>
                                        <tr><td>Pessoa 3</td><td class="text-danger fw-bold">Pendente</td></tr>
                                        <tr><td>Pessoa 4</td><td class="text-success fw-bold">Ativo</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulário de Novo Aluno -->
                <div class="pb-2 mb-4 border-bottom">
                    <h1 class="h3 fw-bold">Novo Registro de Aluno</h1>
                </div>

                <div class="card shadow-sm border-0 p-4 mb-4">
                    <form action="#" method="POST">
                        
                        <h5 class="text-brand border-bottom pb-2 mb-3">Dados Pessoais</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label for="nome" class="form-label text-muted fw-bold">Nome Completo *</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: João da Silva" required>
                            </div>
                            <div class="col-md-6">
                                <label for="documento" class="form-label text-muted fw-bold">Documento (NIF/CPF) *</label>
                                <input type="text" class="form-control" id="documento" name="documento" placeholder="000.000.000-00" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nascimento" class="form-label text-muted fw-bold">Data de Nascimento</label>
                                <input type="date" class="form-control" id="nascimento" name="nascimento">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label text-muted fw-bold">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="joao@exemplo.com">
                            </div>
                            <div class="col-md-6">
                                <label for="telefone" class="form-label text-muted fw-bold">Contato Telefônico *</label>
                                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                            </div>
                        </div>

                        <h5 class="text-brand border-bottom pb-2 mb-3">Plano e Faturamento</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="plano" class="form-label text-muted fw-bold">Plano Subscrito *</label>
                                <select class="form-select" id="plano" name="plano" required>
                                    <option value="">Selecione um plano...</option>
                                    <option value="mensal">Mensal Livre (R$ 120,00)</option>
                                    <option value="trimestral">Trimestral (R$ 300,00)</option>
                                    <option value="anual">Anual (R$ 1.000,00)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="vencimento" class="form-label text-muted fw-bold">Dia de Vencimento</label>
                                <select class="form-select" id="vencimento" name="vencimento">
                                    <option value="5">Dia 5</option>
                                    <option value="10">Dia 10</option>
                                    <option value="15">Dia 15</option>
                                    <option value="20">Dia 20</option>
                                </select>
                            </div>
                        </div>

                        <h5 class="text-brand border-bottom pb-2 mb-3">Informações Médicas (Anamnese)</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-12">
                                <label for="observacoes" class="form-label text-muted fw-bold">Restrições físicas, lesões ou notas importantes?</label>
                                <textarea class="form-control" id="observacoes" name="observacoes" rows="4" placeholder="Descreva aqui qualquer informação relevante para os instrutores..."></textarea>
                            </div>
                        </div>

                        <!-- Botões de Ação -->
                        <div class="d-flex justify-content-end gap-2 mt-2">
                            <button type="button" class="btn btn-danger fw-bold px-4">Cancelar</button>
                            <button type="submit" class="btn bg-brand fw-bold px-4">Guardar Registro</button>
                        </div>
                    </form>
                </div>
                
            </main>
        </div>
    </div>

    <!-- Script do Chart.js -->
    <script>
        const ctx = document.getElementById('financeiroChart').getContext('2d');
        const financeiroChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set'],
                datasets: [
                    {
                        label: 'Faturamento (R$)',
                        data: [38000, 41000, 40500, 43000, 44500, 45200],
                        backgroundColor: '#18bc9c',
                        borderRadius: 4
                    },
                    {
                        label: 'Despesas (R$)',
                        data: [20000, 22000, 19000, 21000, 23000, 20500],
                        backgroundColor: '#e74c3c',
                        borderRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
    
    <!-- Bootstrap JS (Necessário para componentes interativos no futuro) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
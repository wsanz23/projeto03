<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=<div class="main-content">
            <title>Registo de Aluno</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div>
                </div>
                <div class="main-content">
                    <div class="header">
                        <div>
                            <h1>Novo Registo de Aluno</h1>
                        </div>
                    </div>

                    <div class="form-container">
                        <form action="#" method="POST">
                            <h3 class="form-section-title">Dados Pessoais</h3>
                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label for="nome">Nome Completo *</label>
                                    <input type="text" id="nome" name="nome" placeholder="Ex: João da Silva" required>
                                </div>
                                <div class="form-group">
                                    <label for="documento">Documento de Identificação (CPF) *</label>
                                    <input type="text" id="documento" name="documento" placeholder="000.000.000-00" required>
                                </div>
                                <div class="form-group">
                                    <label for="nascimento">Data de Nascimento</label>
                                    <input type="date" id="nascimento" name="nascimento">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" id="email" name="email" placeholder="joao@exemplo.com">
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Celular *</label>
                                    <input type="tel" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                    </div>
                </div>
                
                <h3 class="form-section-title">Plano e Faturação</h3>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="plano">Plano Subscrito *</label>
                        <select id="plano" name="plano" required>
                            <option value="">Selecione um plano...</option>
                            <option value="mensal">Mensal Livre (R$ 120,00)</option>
                            <option value="trimestral">Trimestral (R$ 300,00)</option>
                            <option value="anual">Anual (R$ 1.000,00)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vencimento">Dia de Vencimento</label>
                        <select id="vencimento" name="vencimento">
                            <option value="5">Dia 5</option>
                            <option value="10">Dia 10</option>
                            <option value="15">Dia 15</option>
                            <option value="20">Dia 20</option>
                        </select>
                    </div>
                </div>
                
                <h3 class="form-section-title">Informações Médicas (Anamnese)</h3>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="observacoes">Restrições físicas, lesões ou notas importantes?</label>
                        <textarea id="observacoes" name="observacoes" rows="4" placeholder="Descreva aqui qualquer informação relevante para os instrutores..."></textarea>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-cancel">Cancelar</button>
                    <button type="submit" class="btn btn-save">Guardar Registo</button>
                    
                </div>
                
            </form>
        </div>
    </div>
    
    
</body>
</html>
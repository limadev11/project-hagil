<?php
session_start();
include('verificalogin.php');
include('connect.php'); // conexão com o banco

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario       = trim($_POST['usuario']);
    $email         = trim($_POST['email']);
    $senha_atual   = trim($_POST['senha_atual']);
    $nova_senha    = trim($_POST['nova_senha']);
    $confirma_senha= trim($_POST['confirma_senha']);
    $nivel_acesso  = trim($_POST['nivel_acesso']);

    // Buscar usuário logado no banco (ajuste o nome da tabela)
    $id_usuario = $_SESSION['id_usuario'];
    $sql = "SELECT senha FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $stmt->bind_result($senha_hash);
    $stmt->fetch();
    $stmt->close();

    if (!$senha_hash || !password_verify($senha_atual, $senha_hash)) {
        $erro = "Senha atual incorreta.";
    } elseif ($nova_senha !== $confirma_senha) {
        $erro = "As senhas não conferem.";
    } else {
        // Atualizar usuário
        $hash_nova = password_hash($nova_senha, PASSWORD_DEFAULT);

        $sql_update = "UPDATE usuarios SET usuario=?, email=?, senha=?, nivel_acesso=? WHERE id=?";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param("ssssi", $usuario, $email, $hash_nova, $nivel_acesso, $id_usuario);

        if ($stmt->execute()) {
            $sucesso = "Alterações salvas com sucesso!";
        } else {
            $erro = "Erro ao atualizar dados.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Configurações de Segurança</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-form-post">
        <h2>Configurações de Segurança</h2>
        <form id="form-seguranca" method="post" action="">
            <div class="form-row">
                <label for="usuario">Usuário *</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="form-row">
                <label for="email">E-mail *</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-row">
                <label for="senha_atual">Senha Atual *</label>
                <input type="password" id="senha_atual" name="senha_atual" required minlength="6">
            </div>
            <div class="form-row">
                <label for="nova_senha">Nova Senha *</label>
                <input type="password" id="nova_senha" name="nova_senha" required minlength="6">
            </div>
            <div class="form-row">
                <label for="confirma_senha">Confirmar Nova Senha *</label>
                <input type="password" id="confirma_senha" name="confirma_senha" required>
            </div>
            <div class="form-row">
                <label for="nivel_acesso">Nível de Acesso</label>
                <select id="nivel_acesso" name="nivel_acesso" required>
                    <option value="Administrador">Administrador</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Usuário Padrão">Usuário Padrão</option>
                </select>
            </div>
            <div class="form-row" style="text-align:center;">
                <button type="submit" class="btn btn-adicionar">Salvar Alterações</button>
                <a href="menu.php" class="btn btn-voltar">Voltar</a>
            </div>

            <?php if (!empty($erro)): ?>
                <div style="color: red; text-align:center; margin-top:10px;"><?= $erro ?></div>
            <?php endif; ?>

            <?php if (!empty($sucesso)): ?>
                <div style="color: green; text-align:center; margin-top:10px;"><?= $sucesso ?></div>
            <?php endif; ?>
        </form>
    </div>
    
    <!-- Parte Java Script * Não tocar nele * -->
    <script>
        document.getElementById('form-seguranca').onsubmit = function(e) {
            var senhaAtual = document.getElementById('senha_atual').value.trim();
            var novaSenha = document.getElementById('nova_senha').value.trim();
            var confirmaSenha = document.getElementById('confirma_senha').value.trim();

            if (novaSenha !== confirmaSenha) {
                alert('A confirmação da nova senha não confere.');
                e.preventDefault();
                return false;
            }
            if (novaSenha.length < 6) {
                alert('A senha deve ter pelo menos 6 caracteres.');
                e.preventDefault();
                return false;
            }
            if (!/[A-Z]/.test(novaSenha) || !/[0-9]/.test(novaSenha)) {
                alert('A senha deve conter pelo menos uma letra maiúscula e um número.');
                e.preventDefault();
                return false;
            }
        };
    </script>
</body>
</html>

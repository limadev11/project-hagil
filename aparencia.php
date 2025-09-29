<?php
// Processamento do formulário (exemplo simples, sem validação avançada)
$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Upload plano de fundo login
    if (isset($_FILES['login_bg']) && $_FILES['login_bg']['error'] === UPLOAD_ERR_OK) {
        move_uploaded_file($_FILES['login_bg']['tmp_name'], 'uploads/login_bg.jpg');
    }
    // Upload plano de fundo menu
    if (isset($_FILES['menu_bg']) && $_FILES['menu_bg']['error'] === UPLOAD_ERR_OK) {
        move_uploaded_file($_FILES['menu_bg']['tmp_name'], 'uploads/menu_bg.jpg');
    }
    // Cor principal
    if (isset($_POST['main_color'])) {
        file_put_contents('config/main_color.txt', $_POST['main_color']);
    }
    $success = true;
}
$mainColor = file_exists('config/main_color.txt') ? trim(file_get_contents('config/main_color.txt')) : '#009688';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Configurações de Aparência</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Exemplo de CSS base, ajuste conforme seu .container-form-post -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="scss/main/style.css">

    <!-- Ícones via CDN (opcional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container-form-post">
        <div class="form-title">
            <i class="fas fa-paint-brush"></i> Configurações de Aparência
        </div>
        <?php if ($success): ?>
            <div class="success-msg">
                <i class="fas fa-check-circle"></i> Alterações salvas com sucesso!
            </div>
        <?php endif; ?>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="login_bg">
                    <i class="fas fa-image"></i> Plano de Fundo da Tela de Login
                </label>
                <input type="file" name="login_bg" id="login_bg" accept="image/*" placeholder="Selecione uma imagem para a tela de login">
            </div>
            <div class="form-group">
                <label for="menu_bg">
                    <i class="fas fa-images"></i> Plano de Fundo do Menu Lateral
                </label>
                <input type="file" name="menu_bg" id="menu_bg" accept="image/*" placeholder="Selecione uma imagem para o menu lateral">
            </div>
            <div class="form-group">
                <label for="main_color">
                    <i class="fas fa-palette"></i> Cor Principal do Sistema
                </label>
                <input type="color" name="main_color" id="main_color" value="<?php echo htmlspecialchars($mainColor); ?>">
                <input type="text" value="<?php echo htmlspecialchars($mainColor); ?>" readonly style="width:90px; border:none; background:transparent; color:#333; font-weight:bold;">
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-save">
                    <i class="fas fa-save"></i> Salvar Alterações
                </button>
                <a href="menu.php" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>
            </div>
        </form>
    </div>
</body>

</html>
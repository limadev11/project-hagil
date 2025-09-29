<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Obter o ID do usuário a ser excluído
$id = isset($_GET['deleteid']) ? intval($_GET['deleteid']) : 0;

if ($id > 0) {
    $sql = "SELECT * FROM cliente WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $nome = $row['nome'];
        $email = $row['email'];
        $whatsapp = $row['whatsapp'];
        $endereco = $row['endereco'];
        $bairro = $row['bairro'];
        $cidade = $row['cidade'];
        $uf = $row['uf'];
    } else {
        die('Erro ao buscar despesa: ' . mysqli_error($con));
    }
} else {
    die('ID inválido.');
}

if (isset($_POST['submit'])) {
    // Deletar o usuário
    $sql = "DELETE FROM cliente WHERE id = $id";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        header('Location: cliselect.php');
        exit();
    } else {
        die('Erro ao excluir despesa: ' . mysqli_error($con));
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Usuário</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top px-4 px-lg-5 ">

        <h1 class="m-0">Superar</h1>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="menu.php" class="nav-item nav-link">Menu</a>
                <a href="logout.php" class="nav-item nav-link">Sair</a>
            </div>
        </div>
    </nav>

    <!-- Página de Deletar Usuário -->
    <div class="container my-5">
        <h2 class="text-center">Deletar Usuário</h2>

        <div class="container bg-dark p-4 text-white">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="row">
                    <div class="col-md-4">
                        <h5>Nome</h5>
                        <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>" placeholder="Nome do Usuário" readonly>
                    </div>

                    <div class="col-md-4">
                        <h5>Email</h5>
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="E-mail do Usuário" readonly>
                    </div>

                    <div class="col-md-4">
                        <h5>Whatsapp</h5>
                        <input type="text" class="form-control" name="whatsapp" value="<?php echo $whatsapp; ?>" placeholder="33000000000" readonly>
                    </div>

                    <div class="col-md-4">
                        <h5>Endereço</h5>
                        <input type="text" class="form-control" name="endereco" value="<?php echo $endereco; ?>" placeholder="Rua XYZ" readonly>
                    </div>

                    <div class="col-md-4">
                        <h5>Bairro</h5>
                        <input type="text" class="form-control" name="bairro" value="<?php echo $bairro; ?>" placeholder="Bairro XYZ" readonly>
                    </div>

                    <div class="col-md-4">
                        <h5>Cidade</h5>
                        <input type="text" class="form-control" name="cidade" value="<?php echo $cidade; ?>" placeholder="Nome da Cidade" readonly>
                    </div>

                    <div class="col-md-4">
                        <h5>UF</h5>
                        <input type="text" class="form-control" name="uf" value="<?php echo $uf; ?>" placeholder="UF" readonly>
                    </div>

                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-secondary rounded-pill py-3 px-5" onclick="window.location.href='cliselect.php'" style="margin-top: 15px;">Voltar</button>
                        <button type="submit" name="submit" class="btn btn-danger rounded-pill py-3 px-5 mt-3">Deletar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

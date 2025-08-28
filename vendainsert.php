<?php
session_start();
include('verificalogin.php');
include('connect.php');
if (isset($_POST['submit'])) {
    $idproduto = $_POST['idproduto'];
    $idvendedor = $_POST['idvendedor'];
    $quantidade = $_POST['quantidade'];
    $datavenda = $_POST['datavenda'];

    $sql = 'INSERT INTO venda (idproduto, idvendedor, quantidade, datavenda) 
        VALUES ("' . $idproduto . '", "' . $idvendedor . '", "' . $quantidade . '", "' . $valortotal . '", "' . $preco . '", "' . $datavenda .'")';
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location: vendaselect.php');
    } else {
        die('' . mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Superar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .form-control {
            width: 350px;
            margin-bottom: 15px;
        }

        .container {
            max-width: 800px;
            /* Limitar a largura máxima do container */
        }
    </style>
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
        <h1 class="m-0">Produto</h1>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="menu.php" class="nav-item nav-link active">Menu</a>
                <a href="logout.php" class="nav-item nav-link active">Sair</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
        <div class="container" style="background-color: #404A3D; border-radius: 5px;">
            <div class="container text-center py-2" style="color: black;">
                <h1 style="color: white;">Incluir Venda</h1>
            </div>
            <br>
            <form action="" method="post" class="center-content" style="margin-top: 20px;">
                <h4 style="color: white;">Dados da Venda:</h4>
                <br>

                <!-- Centralizando conteúdo -->
                <div class="center-content">

                    <!-- Nome do Produto -->
                    <label for="nome" style="color:white;">Nome do Produto:</label>
                    <?php
                    $sqll = 'select * from produto order by id';
                    $result = mysqli_query($con, $sqll);
                    if ($result) {
                        echo '<select name="idproduto" class="form-control">';
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                        }
                        echo '</select>';
                    }
                    ?>

                    <!-- Nome do Vendedor -->
                    <label for="nome" style="color:white;">Nome do Vendedor:</label>
                    <?php
                    $sqll = 'select * from vendedor order by id';
                    $result = mysqli_query($con, $sqll);
                    if ($result) {
                        echo '<select name="idvendedor" class="form-control">';
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                        }
                        echo '</select>';
                    }
                    ?>
                    <!-- Quantidade -->
                    <label for="quantidade" style="color:white;">Quantidade vendida:</label>
                    <input type="text" name="quantidade" class="form-control" required>

                    <!-- Data da Venda -->
                    <label for="datavenda" style="color:white;">Data da Venda:</label>
                    <input type="date" name="datavenda" class="form-control" required>
                </div>

                <!-- Botões -->
                <div class="container" style="margin-top: 40px;">
                    <div class="row">
                        <div class="col text-center">
                            <a href="vendaselect.php">
                                <button type="button" style="padding: 9px; width: 100px;"
                                    class="btn btn-dark">Voltar</button>
                            </a>
                            <button type="submit" name="submit" style="padding: 9px; width: 100px;"
                                class="btn btn-secondary">Adicionar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
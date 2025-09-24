<?php
session_start();
include('verificalogin.php');
include('connect.php');
if (isset($_POST['submit'])) {
    $idproduto = $_POST['idproduto'];
    $idvendedor = $_POST['idvendedor'];
    $idcliente = $_POST['idcliente'];
    $quantidade = $_POST['quantidade'];
    $datavenda = $_POST['datavenda'];
    $precocusto = $_POST['precocusto'];
    $preco = $_POST['preco'];

    $sql = 'insert into venda(idproduto, idvendedor, idcliente, quantidade, datavenda, preco, precocusto) 
            values (' . $idproduto . ',' . $idvendedor . ',' . $idcliente . ',' . $quantidade . ',' . $datavenda . ',' . $preco . ',' . $precocusto . ')';
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

</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg  navbar-light sticky-top px-4 px-lg-5">
        <h1 class="m-0">Venda</h1>
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
    <div class="container-form-post">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
            <div class="container p-3">
                <div class="container text-center py-2">
                    <h1>Incluir Venda</h1>
                </div>

                <form action="" method="post" class="mt-3">
                    <h4>Dados da Venda:</h4>

                    <!-- Produto -->
                    <div class="mb-3">
                        <label for="idproduto" class="form-label">Nome do Produto:</label>
                        <?php
                        $sqll = 'SELECT * FROM produto ORDER BY id';
                        $result = mysqli_query($con, $sqll);
                        if ($result) {
                            echo '<select name="idproduto" class="form-control">';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                            }
                            echo '</select>';
                        }
                        ?>
                    </div>

                    <!-- Vendedor -->
                    <div class="mb-3">
                        <label for="idvendedor" class="form-label">Nome do Vendedor:</label>
                        <?php
                        $sqll = 'SELECT * FROM vendedor ORDER BY id';
                        $result = mysqli_query($con, $sqll);
                        if ($result) {
                            echo '<select name="idvendedor" class="form-control">';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                            }
                            echo '</select>';
                        }
                        ?>
                    </div>

                    <!-- Cliente -->
                    <div class="mb-3">
                        <label for="idcliente" class="form-label">Nome do Cliente:</label>
                        <?php
                        $sqll = 'SELECT * FROM cliente ORDER BY id';
                        $result = mysqli_query($con, $sqll);
                        if ($result) {
                            echo '<select name="idcliente" class="form-control">';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                            }
                            echo '</select>';
                        }
                        ?>
                    </div>

                    <!-- Quantidade -->
                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade vendida:</label>
                        <input type="text" name="quantidade" class="form-control" required>
                    </div>

                    <!-- Data -->
                    <div class="mb-3">
                        <label for="datavenda" class="form-label">Data da Venda:</label>
                        <input type="date" name="datavenda" class="form-control" required>
                    </div>

                    <!-- Preço Custo -->
                    <div class="mb-3">
                        <label for="precocusto" class="form-label">Preço Custo:</label>
                        <input type="number" name="precocusto" class="form-control" step="0.01" required>
                    </div>

                    <!-- Preço Venda -->
                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço Venda:</label>
                        <input type="number" name="preco" class="form-control" step="0.01" required>
                    </div>

                    <!-- Botões -->
                    <div class="text-center mt-4">
                        <a href="vendaselect.php" class="btn btn-voltar">Voltar</a>
                        <button type="submit" name="submit" class="btn btn-adicionar">Adicionar</button>
                    </div>
                </form>
            </div>
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
<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Obter o ID do venda a ser excluído
$id = $_GET['deleteid'];
$sql = 'select v.id id, p.id idp, p.nome produto, ve.id idv, ve.nome vendedor,
        p.precocusto, p.precovenda, v.quantidade, v.datavenda,
        p.precovenda * v.quantidade as valortotal
        from venda v
        inner join produto p
        on p.id = v.idproduto
        inner join vendedor ve
        on ve.id = v.idvendedor where v.id = ' .$id;
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$quantidade = $row['quantidade'];
$datavenda = $row['datavenda'];
$produto =  $row['produto'];
$vendedor =  $row['vendedor'];
if (isset($_POST['submit'])) {
    $sql = 'delete from venda where id =' . $id;
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location: vendaselect.php');
    } else {
        die(mysqli_error($con));
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Vendas</title>
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
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
        <h1 class="m-0">Superar</h1>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="menu.php" class="nav-item nav-link">Menu</a>
                <a href="logout.php" class="nav-item nav-link">Sair</a>
            </div>
        </div>
    </nav>

    <!-- Página de Deletar Vendas-->
    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
    <div class="container" style="border-radius: 5px;">
        <div class="container text-center py-5" style="color: black;">
            <h2 class="text-center">Deletar Vendas</h2>

            <div class="container bg-dark p-4 text-white">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="row mb-3">
                        <!-- Nome do Produto -->
                        <div class="col-md-6">
                            <label class="form-label" style="color: white;">Nome do Produto:</label>
                            <input type="text" class="form-control" name="produto" value="<?php echo $produto; ?>" required>
                        </div>
                        <!-- Nome do Vendedor -->
                        <div class="col-md-6">
                            <label class="form-label" style="color: white;">Vendedor:</label>
                            <input type="text" class="form-control" name="vendedor" value="<?php echo $vendedor; ?>" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <!-- Quantidade -->
                        <div class="col-md-6">
                            <label class="form-label" style="color: white;">Quantidade:</label>
                            <input type="text" class="form-control" name="quantidade" id="quantidade" value="<?php echo $quantidade; ?>" required>
                        </div>
                        <!-- Data de Venda -->
                        <div class="col-md-6">
                            <label class="form-label" style="color: white;">Data da venda:</label>
                            <input type="date" class="form-control" name="datavenda" id="datavenda" value="<?php echo $datavenda; ?>" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary rounded-pill py-3 px-5" onclick="window.location.href='vendaselect.php'">Não, Voltar</button>
                        <button type="submit" name="submit" class="btn btn-danger rounded-pill py-3 px-5 mt-3">Deletar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



                </form>
            </div>
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

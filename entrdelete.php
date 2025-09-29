<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Obter o ID da entrada a ser excluído
$id = $_GET['deleteid'];
$sql = 'select e.id, p.nome nome, e.dataentrada as data, e.preco preco, e.quantidade quantidade from entradaestoque e
        inner join produto p 
        on p.id = e.idproduto 
        where e.id = ' . $id;
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$idproduto = $row['nome'];
$dataentrada = $row['data'];
$preco =  str_replace(',', '.', $row['preco']);
$quantidade = $row['quantidade'];
if (isset($_POST['submit'])) {
    $sql = 'delete from entradaestoque where id =' . $id;
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location: entrselect.php');
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
    <nav class="navbar navbar-expand-lg navbar-light sticky-top px-4 px-lg-5 ">

        <h1 class="m-0">Superar</h1>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="menu.php" class="nav-item nav-link">Menu</a>
                <a href="logout.php" class="nav-item nav-link">Sair</a>
            </div>
        </div>
    </nav>

    <!-- Página de Deletar Entradas-->
    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
    <div class="container" style="border-radius: 5px;">
            <div class="container text-center py-5" style="height: 100px; color: black;">
            <h2 class="text-center">Deletar Entrada</h2>

            <div class="container bg-dark p-4 text-white">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                    <div class="row">
                        <div class="col-md-4">
                            <h5>Nome da Entrada:</h5>
                            <input type="text" class="form-control" name="idproduto" value="<?php echo $idproduto; ?>" placeholder="Nome da Entrada" readonly>
                        </div>

                        <div class="col-md-4">
                            <h5>Data da Entrada:</h5>
                            <input type="email" class="form-control" name="data" value="<?php echo  $dataentrada; ?>" placeholder="" readonly>
                        </div>

                        <div class="col-md-4">
                            <h5>Preço:</h5>
                            <input type="number" class="form-control" name="preco" value="<?php echo $preco; ?>" placeholder="" readonly>
                        </div>

                        <div class="col-md-4">
                            <h5>Quantidade:</h5>
                            <input type="text" class="form-control" name="quantidade" value="<?php echo $quantidade; ?>" placeholder="" readonly>
                        </div>

                        <div class="col-md-4 text-center">
                            <button type="button" class="btn btn-secondary rounded-pill py-3 px-5" onclick="window.location.href='entrselect.php'" style="margin-top: 15px;">Não, Voltar</button>
                            <button type="submit" name="submit" class="btn btn-danger rounded-pill py-3 px-5 mt-3" style="margin-left: 20px;">Deletar</button>
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

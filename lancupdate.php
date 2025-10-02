<?php
session_start();
include('verificalogin.php');
include('connect.php');
$id = $_GET['updateid'];
$sql = 'select * from despesa where id =' . $id;
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$observacao = $row['observacao'];
$valor =  str_replace(',', '.', $row['valor']);
$iddespesa = $row['idtipodespesa'];
$datadespesa = $row['data'];
if (isset($_POST['submit'])) {
    $observacao = $_POST['observacao'];
    $valor = $_POST['valor'];
    $iddespesa = $_POST['idtipodespesa'];
    $datadespesa = $_POST['data'];
    $sql = 'update despesa set observacao="' . $observacao . '", valor="' . $valor . '", idtipodespesa="' . $iddespesa . '", data="' .  $datadespesa . '" where id=' . $id;
    $result = mysqli_query($con, $sql);
    if ($result) {
    header('location: lancselect.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Atualizar Usuário</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg  navbar-light sticky-top px-4 px-lg-5">
        <h1 class="m-0">Superar</h1>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="menu.php" class="nav-item nav-link">Menu</a>
                <a href="logout.php" class="nav-item nav-link active">Sair</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
        <div class="container" style="background-color: #404A3D; width: 2000px; height: 100px; border-radius: 5px;">
            <div class="container text-center py-5" style="height: 100px; color: black;">
                <h2 style="color: rgb(255, 255, 255); font-size: 2.5rem;">Atualizar Usuário:</h2>
            </div>
        </div>
        <div class="container" style="background-color: #556152;">
            <form method="post" >
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <div class="row" style="background-color: #556152;">
                    <div class="col-12"> <br><br>
                        <div class="form-floating" style="width: 400px;">
                            <h2 style="color: white;">Dados da Despesa:</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                                    <h4 for="text" style="color:white;">Código da Despesa</h4>
                        </div>
                        <div class="col-9" style="width: 300px; margin-left: 490px;">           
                                <?php
                                            $sqll = 'select * from tipodespesa order by id';
                                            $result = mysqli_query($con, $sqll);
                                            if ($result) {
                                                echo '<select 
                                                    name="idtipodespesa" class="form-control">';
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="' . $row['id'] . '">' .
                                                        $row['nome'] . '</option>';
                                                }
                                                echo '</select>';
                                            }
                                    ?> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12"> <br><br>
                            <div class="form-floating" style="margin-left: 0px">
                                <h5 style="color: white;">Observação</h5>
                            </div>
                        </div>
                        <div class="col" style="margin-left: 450px;">
                            <input type="text" class="form-control" name="observacao" id="observacao" value="<?php echo $observacao; ?>" required style="width: 350px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12"> <br><br>
                            <div class="form-floating" style="margin-left: 0px;">
                                <h5 style="color: white;">Valor</h5>
                            </div>
                        </div>
                        <div class="col" style="margin-left: 450px;">
                            <input type="number" class="form-control" name="valor" id="valor" value="<?php echo $valor; ?>" required style="width: 350px;">
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-12"> <br><br>
                        <div class="form-floating" style="margin-left: 0px;">
                            <h5 style="color: white;">Data de Despesa</h5>
                        </div>
                        <div style="width: 350px; margin-left: 450px;">
                            <input type="date" class="form-control" name="data" id="senha" value="<?php echo $datadespesa?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <br>
                        <?php
                           echo "<a href='lancselect.php'>
                           <button type='button' style='padding: 9px; width: 100px;' class='btn btn-dark'>Não, Voltar</button></a>";
                            ?>
                            <button class="btn btn-secondary rounded-pill py-3 px-5" type="submit" name="submit">Atualizar</button>
                        </div>
                    </div>
                </div>
                <br>
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
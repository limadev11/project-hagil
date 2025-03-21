<?php
session_start();
include('verificalogin.php');
include('connect.php');
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $sql = 'insert into vendedor (nome) value ("' . $nome . '")';
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location: vendeselect.php');
    } else {
        die(''. mysqli_error($con));

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
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
        <h1 class="m-0">Vendedor</h1>
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
    <div class="container" style="margin-top: 30px; background-color: #404A3D;">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
            <div class="container" style="width: 2000px; height: 100px; border-radius: 5px;">
                <div class="container text-center py-5" style="height: 100px; color: black;">
                    <h2 style="color: white;">Adicionar Vendedor</h2>
                </div>
            </div>
            <form action="" method="post" style="margin-top: 20px;">
                <h4 style="color: white;">Dados do Vendedor:</h4>
                <div class="form-group">
                    <div class="row" style="margin-top: 30px;">
                        <!-- Nome -->
                        <div class="col-md-6" style="margin-left: 330px;">
                            <label for="nome" style="color:white;">Nome:</label>
                            <input type="text" name="nome" class="form-control" style="padding: 9px;" required>
                        </div>
                        <!-- Fim Nome -->
                        <div class="container" style="margin-top: 40px;">
                            <div class="row">
                                <!-- Botões -->
                                <div class="col text-center">
                                    <a href="vendeselect.php">
                                        <button type="button" style="padding: 9px; width: 100px;"
                                            class="btn btn-dark">Voltar</button>
                                    </a>
                                    <button type="submit" name="submit" style="padding: 9px; width: 100px;"
                                        class="btn btn-secondary">Adicionar</button>
                                </div>
                                <!-- Fim Botões -->
                            </div>
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
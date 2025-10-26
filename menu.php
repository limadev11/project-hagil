<?php
session_start();
include('verificalogin.php');
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .flex-grow-1.p-4 {
            background-image: url('img/1.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }


        .section-title {
            padding: 0.5rem 2rem;
            letter-spacing: 2px;
        }

        .btn-sidebar {
            color: #FFFF;
        }

        .btn-sidebar img {
            margin-right: 0.5rem;
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <!-- Sidebar Vertical -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-dark bg-dark d-md-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="proselect.php" class="nav-item nav-link">Produtos</a>
                    <a href="vendeselect.php" class="nav-item nav-link">Vendedores</a>
                    <a href="tpdselect.php" class="nav-item nav-link">Tipos de Despesas</a>
                    <a href="proselect.php" class="nav-item nav-link">Produtos</a>
                    <a href="admselect.php" class="nav-item nav-link">Admissão</a>
                    <a href="cliselect.php" class="nav-item nav-link">Cliente</a>
                    <a href="vendaselect.php" class="nav-item nav-link">Venda</a>
                    <a href="ususelect.php" class="nav-item nav-link">Usuários</a>
                    <a href="logout.php" class="nav-item nav-link active">Sair</a>
                </div>
            </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar Vertical -->
        <div class="bg-dark text-white vh-100 p-3 sidebar collapse d-md-block animate__animated animate__fadeInLeft"
            id="sidebarMenu" style="width: 250px;">
            <!-- Logo -->
            <h3 class="text-center mb-4">Superar</h3>
            <!-- Perfil -->
            <div class="text-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="7" r="4" />
                    <path d="M5.5 21a6.5 6.5 0 0 1 13 0" />
                </svg>

                <p class="mt-2">
                    <?php echo $_SESSION['nome']; ?>
                </p>
            </div>
            <!-- Menu -->
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="consultageral.php" class="btn-sidebar mb-3 d-flex align-items-center">
                        <img src="img/comercial.png" alt="">
                        Consulta Geral
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="vendaselect.php" class="btn-sidebar mb-3 d-flex align-items-center">
                        <img src="img/calendario-linhas-caneta.png" alt=""> Vendas
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="proselect.php" class="btn-sidebar mb-3 d-flex align-items-center">
                        <img src="img/carrinho-de-compras.png" alt="">
                        Produtos
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="vendeselect.php" class="btn-sidebar mb-3 d-flex align-items-center">
                        <img src="img/comercial.png" alt=""> Vendedores
                    </a>
                <li class="nav-item mb-2">
                    <a href="cliselect.php" class="btn-sidebar mb-3 d-flex align-items-center">
                        <img src="img/do-utilizador.png" alt="">
                        Cliente
                    </a>
                </li>
                </li>
                <li class="nav-item mb-2">
                    <a href="tpdselect.php" class="btn-sidebar mb-3 d-flex align-items-center">
                        <img src="img/saco-de-dolar.png" alt=""> Tipos de Despesas
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="lancselect.php" class="btn-sidebar mb-3 d-flex align-items-center">
                        <img src="img/saco-de-dolar.png" alt=""> Lançamento de despesas

                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="entrselect.php" class="btn-sidebar mb-3 d-flex align-items-center">
                        <img src="img/sair-alt.png" alt=""> Entrada de Estoque
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="ususelect.php" class="btn-sidebar mb-3 d-flex align-items-center">
                        <img src="img/comercial.png" alt="">
                        Usuários
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="btn-sidebar mb-3 d-flex align-items-center">
                        <img src="img/sair.png" alt="">
                        Sair
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="btn-sidebar mb-3 d-flex align-items-center" data-bs-toggle="collapse" href="#configSubmenu"
                        role="button" aria-expanded="false" aria-controls="configSubmenu">
                        <img src="img/configuracoes.png" alt="">
                        Configurações
                    </a>
                    <div class="collapse ps-4" id="configSubmenu">
                        <a href="aparencia.php" class="btn-sidebar d-flex align-items-center mb-2">🎨 Aparência</a>
                        <a href="seguranca.php" class="btn-sidebar d-flex align-items-center mb-2">🔒 Segurança</a>
                    </div>
                </li>



            </ul>
        </div>

        <!-- Conteúdo Principal -->
        <div class="flex-grow-1 p-4">
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.2s" style="max-width: 500px;">
                        <p class="section-title bg-transparent text-center text-primary px-3">Bem-vindo!</p>
                    </div>
                </div>
            </div>
        </div>




        <!-- Navbar End -->


        <!-- Page Header Start -->
        <!-- Page Header End -->






        <!-- Informacoes -->
        <a href="#Canva#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><img color="white"
                width="25" height="25" src="https://img.icons8.com/ios-filled/50/question-mark.png"
                alt="question-mark" /></a>

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
        <script type="module" src="https://esm.sh/ionicons@8.0.0/loader"></script>
        <script nomodule src="https://esm.sh/ionicons@8.0.0/loader"></script>
</body>

</html>
<?php
session_start();
include('verificalogin.php');
include('connect.php');
$id = $_GET['updateid'];
$sql = 'select * from tipodespesa where id =' . $id;
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$nome = $row['nome'];
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $sql = 'update tipodespesa set nome="' . $nome .
        '" where id=' . $id;
    echo  $sql;
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location: tpdselect.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Atualizar Despesa</title>
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
    <style>
     /* Container de sugestões */
        #suggestions {
            position: absolute;
            /* Fica posicionado em relação ao input */
            top: 100%;
            /* Fica logo abaixo do input */
            left: 0;
            width: 100%;
            /* Mesma largura do input */
            background-color: #fff;
            /* Fundo branco */
            border: 1px solid #ccc;
            /* Borda clara */
            border-top: none;
            /* Remove a borda superior para ficar integrado */
            border-radius: 0 0 8px 8px;
            /* Bordas arredondadas na parte inferior */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Sombra suave */
            max-height: 250px;
            /* Altura máxima com scroll */
            overflow-y: auto;
            z-index: 1000;
            /* Fica acima de outros elementos */
            display: none;
            /* Inicialmente escondido */
        }

        /* Cada sugestão */
        #suggestions div {
            padding: 10px 15px;
            cursor: pointer;
            transition: background 0.2s;
            font-size: 14px;
            color: #333;
        }

        /* Hover na sugestão */
        #suggestions div:hover {
            background-color: #f1f1f1;
        }

        /* Input com autocomplete */
        #search {
            border-radius: 8px;
            /* Bordas arredondadas */
            padding: 10px 15px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        /* Container pai para manter posição relativa */
        .autocomplete-wrapper {
            position: relative;
            /* Necessário para o absolute do #suggestions */
            width: 500px;
            /* ou 100% se quiser responsivo */
            margin: 0 auto;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            /* responsivo no celular */
            margin-top: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            font-family: "Poppins", sans-serif;
            font-size: 15px;
            color: #333;
        }

        thead {
            background: #404A3D;
            color: #fff;
        }

        thead th {
            padding: 14px;
            text-align: center;
            font-weight: 600;
        }

        tbody tr:nth-child(even) {
            background: #f9fafb;
        }

        tbody tr:hover {
            background: #e9f5ec;
            /* cor de destaque */
        }

        td {
            padding: 12px 14px;
            text-align: center;
        }

        /* Botões */
        .btn {
            padding: 6px 12px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s;
        }

        .btn-edit {
            background: #3b82f6;
            color: #fff;
        }

        .btn-edit:hover {
            background: #2563eb;
        }

        .btn-delete {
            background: #ef4444;
            color: #fff;
        }

        .btn-delete:hover {
            background: #dc2626;
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
                <h2 style="color: rgb(255, 255, 255); font-size: 2.5rem;">Atualizar Despesa:</h2>
            </div>
        </div>

        <div class="container" style="background-color: #556152;">
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <div class="row">
                    <div class="col" style="margin-top: 30px; margin-right: 20px;">
                        <h5 style="color: white;">Nome da Despesa:</h5>
                    </div>
                </div>
                <div class="row">
                    <!-- Parte do Imput -->
                    <div class="col" style="margin-top: 30px; margin-left: 455px;">
                        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome; ?>"
                            required style="width: 350px;">
                    </div>
                </div>
                <div class="row">
                    <div class="row mt-4" style="margin-left: 450px;">
                        <br><br>
                        <div class="col-auto">
                            <button class="btn btn-secondary rounded-pill py-3 px-5" type="button"
                                onclick="window.location.href='tpdselect.php'">Voltar</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-secondary rounded-pill py-3 px-5" type="submit"
                                name="submit">Atualizar</button>
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
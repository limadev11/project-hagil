<?php
session_start();
include('verificalogin.php');
include('connect.php');
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $sql = 'insert into cliente (nome, email,whatsapp,endereco,bairro,cidade,uf)
    values ("' . $nome . '", "' . $email . '","' . $whatsapp . '", "' . $endereco . '", "' . $bairro . '", "' . $cidade . '", "' . $uf . '")';
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location: cliselect.php');
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
        <h1 class="m-0">Cliente</h1>
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
            <div class="header-container">
                <h2>Incluir Cliente</h2>
            </div>

            <div class="form-container">
                <form action="" method="post">
                    <h4>Dados do Cliente:</h4>

                    <div class="form-group row">
                        <!-- Nome -->
                        <div class="col-md-6">
                            <label for="nome">Nome do Cliente:</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- Whatsapp -->
                        <div class="col-md-6">
                            <label for="whatsapp">Whatsapp</label>
                            <input type="text" name="whatsapp" class="form-control" required>
                        </div>

                        <!-- Endereço -->
                        <div class="col-md-6">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- Bairro -->
                        <div class="col-md-6">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" class="form-control" required>
                        </div>

                        <!-- Cidade -->
                        <div class="col-md-6">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- UF -->
                        <div class="col-md-6">
                            <label for="uf">UF</label>
                            <input type="text" name="uf" class="form-control" required>
                        </div>
                    </div>

                    <!-- Botões -->
                    <div class="form-actions text-center">
                        <a href="cliselect.php" class="btn btn-voltar">Voltar</a>
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
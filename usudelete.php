<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Obter o ID do usuário a ser excluído
$id = isset($_GET['deleteid']) ? intval($_GET['deleteid']) : 0;

if ($id > 0) {
    $sql = "SELECT * FROM usuario WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $nome = $row['nome'];
        $email = $row['email'];
    } else {
        die('Erro ao buscar usuário: ' . mysqli_error($con));
    }
} else {
    die('ID inválido.');
}

if (isset($_POST['submit'])) {
    // Deletar o usuário
    $sql = "DELETE FROM usuario WHERE id = $id";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        header('Location: ususelect.php');
        exit();
    } else {
        die('Erro ao excluir usuário: ' . mysqli_error($con));
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  navbar-light sticky-top px-4 px-lg-5">
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
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                <div class="row">
                    <div class="col-md-4">
                        <h5>Nome do Usuário:</h5>
                        <input type="text" class="form-control" name="nome" value="<?php echo htmlspecialchars($nome); ?>" placeholder="Nome do Usuário" readonly>
                    </div>

                    <div class="col-md-4">
                        <h5>Endereço de E-Mail:</h5>
                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="E-mail do Usuário" readonly>
                    </div>

                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-secondary rounded-pill py-3 px-5" onclick="window.location.href='ususelect.php'">Não, Voltar</button>
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

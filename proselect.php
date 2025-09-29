<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Query SQL padrão para listar todos os produto
$sql = 'SELECT * FROM `produto` ORDER BY nome ASC';

// Pesquisa por produto
$pesqnome = '';
if (isset($_POST['submit'])) {
    $pesqnome = mysqli_real_escape_string($con, $_POST['pesqnome']);
    // Consulta para buscar produto com base no nome fornecido
    $sql = "SELECT * FROM produto WHERE nome LIKE '%$pesqnome%' ORDER BY nome ASC";
} else {
    // Consulta padrão para listar todos os produto
    $sql = 'SELECT * FROM produto ORDER BY nome ASC';
}

$result = mysqli_query($con, $sql);
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

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
        <div class="container" style="background-color: transparent;">
            <!-- Formulário de pesquisa -->
            <form method="post" action="">
                <div class="row align-items-center" style="background-color: #556152; padding-top:5px; padding-bottom:5px; border-radius: 10px;">
                    <div class="col-auto">
                        <h5 style="color: white;">Nome parcial:</h5>
                    </div>
                    <div class="autocomplete-wrapper">
                        <div class="col-auto">
                            <input type="text" id="search" id="pesqnome" name="pesqnome" class="form-control" placeholder="Nome..." style="width: 500px;" value='<?php echo $pesqnome; ?>'>
                        </div>
                        <div id="suggestions"></div>
                    </div>
                    <div class="col-auto">
                        <a href="proselect.php" class="btn btn-secondary rounded-pill py-2 px-3">Limpar</a>
                        <button class="btn btn-secondary rounded-pill py-2 px-3" type="submit" name="submit">Pesquisar</button>
                        <a href="proinsert.php" class="btn btn-secondary rounded-pill py-2 px-3">Inclusão</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Tabela de Resultados -->
    <div class="table-container">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço Venda</th>
                    <th scope="col">Preço Custo</th>
                    <th scope="col">Valor Comissão</th>
                    <th scope="col">Caixa</th>
                    <th scope="col">Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        // formatando valores
                        $precoVenda = "R$ " . number_format($row['precovenda'], 2, ',', '.');
                        $precoCusto = "R$ " . number_format($row['precocusto'], 2, ',', '.');
                        $comissao   = "R$ " . number_format($row['comissao'], 2, ',', '.');

                        echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nome']}</td>
                        <td>{$precoVenda}</td>
                        <td>{$precoCusto}</td>
                        <td>{$comissao}</td>
                        <td>{$row['estoque']}</td>
                        <td>
                            <a href='proupdate.php?updateid={$row['id']}' class='btn btn-sm btn-primary'>
                                <i class='bi bi-pencil-square'></i> Alterar
                            </a>
                            <a href='prodelete.php?deleteid={$row['id']}' class='btn btn-sm btn-danger'>
                                <i class='bi bi-trash'></i> Excluir
                            </a>
                        </td>
                    </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Nenhum produto encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
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
    <script>
        $(document).ready(function() {
            $('#search').keyup(function() {
                let query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: 'searchproduto.php', // Arquivo PHP que você criou
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#suggestions').fadeIn().html(data);
                        }
                    });
                } else {
                    $('#suggestions').fadeOut();
                }
            });

            // Preencher input ao clicar na sugestão
            $(document).on('click', '#suggestions div', function() {
                $('#search').val($(this).text());
                $('#suggestions').fadeOut();
            });
        });
    </script>

</body>

</html>
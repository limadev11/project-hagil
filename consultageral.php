<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Query SQL padrão para listar todas as admissao
$sql = '';

// Pesquisa por admissao
$pesqvend = '';
$pesqcliente = '';
$pesqproduto = '';
$pesqdata1 = '';
$pesqdata2 = '';
if (isset($_POST['submit'])) {
    $pesqnome = mysqli_real_escape_string($con, $_POST['pesqnome']);
    // Consulta para buscar admissao com base no nome fornecido
    $sql = "";
} 

// $result = mysqli_query($con, $sql);
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
    <link rel="stylesheet" href="css/main/style.css">
</head>

<body>
    <center>
        <nav class="navbar navbar-expand-lg  navbar-light sticky-top px-4 px-lg-5">
            <div class="col">
                <h1>Superar</h1>
            </div>
            <div class="col">
                <!-- Aqui é o formulário de pesquisa usando o form com método post -->
                <form method="post" action="" style="width: 1050px; padding: 5px; display: flex; align-items: flex-start; gap: 15px; 
                    background-color: #556152; border-radius: 10px;">
                    <div style="flex: 1;">
                        <!-- Aqui são todos os campos que o cliente irá preencher para fazer a pesquisa e filtrar os resultados -->
                        <!-- Aqui são todos os campos que o cliente irá preencher para fazer a pesquisa e filtrar os resultados -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-row">
                                    <h5 style="margin-top:5px">Vendedor:</h5>
                                    <input type="text" name="pesqvend" placeholder="Nome..."
                                        style="height:30px; margin-top:5px" maxlength="37"
                                        value="<?php echo $pesqvend; ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-row">
                                    <h5>Cliente:</h5>
                                    <input type="text" name="pesqcliente" placeholder="Nome..." style="height:30px;"
                                        maxlength="37" value="<?php echo $pesqcliente; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-row">
                                    <h5>Produto:</h5>
                                    <input type="text" name="pesqproduto" placeholder="Nome..." style="height:30px"
                                        maxlength="37" value="<?php echo $pesqproduto; ?>">
                                </div>
                            </div>

                            <!-- Filtro de datas, temos a data1, data2, que vai poder filtrar o período de datas que o cliente desejar -->
                            <div class="col-md-6">
                                <div class="form-row" style="margin-right:35px">
                                    <h5>Data:</h5>
                                    <!-- Data 1 -->
                                    <input class="data-input" type="date" name="pesqdata1" style="height:30px"
                                        maxlength="8" value="<?php echo $pesqdata1; ?>">
                                        <h5 class="between-inputs">ao</h5>
                                    <!-- Data 2 -->
                                    <input class="data-input" type="date" name="pesqdata2" style="height:30px;"
                                    maxlength="8" value="<?php echo $pesqdata2; ?>">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Aqui fica os 3 botões principais: Pesquisar (de acordo com os valores nos campos), Limpar os valores inseridos e 
            entrar na área de incluir nova venda -->
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <button class="btn btn-secondary rounded-pill py-2 px-3" type="submit"
                            name="submit">Pesquisar</button>
                        <a href="vendaselect.php" class="btn btn-secondary rounded-pill py-2 px-3">Limpar</a>
                        <a href="vendainsert.php" class="btn btn-secondary rounded-pill py-2 px-3">Incluir</a>
                    </div>
                </form>
            </div>
            <div class="col">
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto p-4 p-lg-0">
                        <a href="menu.php" class="nav-item nav-link">Menu</a>
                        <a href="logout.php" class="nav-item nav-link active">Sair</a>
                    </div>
                </div>
            </div>
        </nav>
        </div>
    </center>

    <!-- Tabela de Resultados -->
    <table class="table table-bordered" style="background-color: white; opacity: 94%; text-align: center;">
        <thead class="thead-dark">
            <tr>
                <th scope="col" style="background-color: #404A3D; color: white;"></th>
                <th scope="col" style="background-color: #404A3D; color: white;"></th>
                <th scope="col" style="background-color: #404A3D; color: white;"></th>
                <th scope="col" style="background-color: #404A3D; color: white;"></th>
                <th scope="col" style="background-color: #404A3D; color: white;"></th>
                <th scope="col" style="background-color: #404A3D; color: white;"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            // if ($result && mysqli_num_rows($result) > 0) {
            //     while ($row = mysqli_fetch_assoc($result)) {
            //         echo "<tr>
            //   </tr>";
            //     }
            // } else {
            //     echo "<tr><td colspan='5'>Nenhum ad encontrado.</td></tr>";
            // }
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
</body>

</html>
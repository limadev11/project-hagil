<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Query SQL padrão para listar todas as entrada
$sql = 'select e.id, p.nome nome, e.dataentrada as data, e.preco preco, e.quantidade quantidade from entradaestoque e
inner join produto p 
on p.id = e.idproduto;';

// Pesquisa por entrada
$pesqnome = '';
if (isset($_POST['submit'])) {
    $pesqnome = mysqli_real_escape_string($con, $_POST['pesqnome']);
    // Consulta para buscar entrada com base no nome fornecido
    $sql = "select e.id, p.nome nome, e.dataentrada as data, e.preco preco, e.quantidade quantidade from entradaestoque e
    inner join produto p 
    on p.id = e.idproduto
    where p.nome like '%$pesqnome%'";
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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top px-4 px-lg-5">

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
    <!-- Formulário de pesquisa -->
    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
        <!-- Cabeçalho do formulário -->
        <div class="container" style="background-color: transparent;" width="200px;">

            <!-- Formulário de pesquisa -->
            <form method="post" action="">
                <div class="row align-items-center" style="background-color: #556152; padding-top:5px; padding-bottom: 5px; border-radius: 5px;">
                    <!-- Campo de texto e botões na mesma linha -->
                    <div class="col-auto">
                        <h5 style="color: white;">Nome parcial:</h5>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="pesqnome" id="pesqnome" class="form-control" placeholder="Nome..." style="width: 400px;" value="<?php echo $pesqnome; ?>">
                    </div>
                    <div class="col-auto">
                        <a href="entrselect.php" class="btn btn-secondary rounded-pill py-2 px-3">Limpar</a>
                        <button class="btn btn-secondary rounded-pill py-2 px-3" type="submit" name="submit">Pesquisar</button>
                        <a href="entrinsert.php" class="btn btn-secondary rounded-pill py-2 px-3">Inclusão</a>

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
                    <th scope="col">IDP</th>
                    <th scope="col">Data da Entrada</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // formatando a data corretamente (YYYY-MM-DD → DD/MM/YYYY)
                        $dataentrada = date("d/m/Y", strtotime($row['data']));

                        echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['nome']}</td>
                  <td>{$dataentrada}</td>
                  <td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>
                  <td>{$row['quantidade']}</td>
                  <td>
                      <a href='entrupdate.php?updateid={$row['id']}' class='btn btn-sm btn-primary'>
                        <i class='bi bi-pencil-square'></i> Alterar
                      </a>
                      <a href='entrdelete.php?deleteid={$row['id']}' class='btn btn-sm btn-danger'>
                        <i class='bi bi-trash'></i> Excluir
                      </a>
                  </td>
                </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Nenhum registro encontrado.</td></tr>";
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
</body>

</html>
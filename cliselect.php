<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Query SQL padrão para listar todos os usuários
$sql = 'SELECT id, nome, email, whatsapp, endereco, bairro, cidade, uf
  from cliente ORDER BY nome ASC';

// Área que vai efetuar a pesquisa pelo nome do cliente
$pesqnome = '';
if (isset($_POST['submit'])) {
    $pesqnome = mysqli_real_escape_string($con, $_POST['pesqnome']);
    // Consulta para buscar usuários com base no nome fornecido
    $sql = $sql = 'SELECT id, nome, email, whatsapp, endereco, bairro, cidade, uf
    from cliente ORDER BY nome ASC WHERE t.nome LIKE ' % $pesqnome % ' ORDER BY t.nome ASC';
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
    <?php include('cabecalhoCRUD.html')?>
    
</head>

<body>
    <!-- Cabeçalho de navegação -->
    <nav class="navbar navbar-expand-lg  navbar-light sticky-top px-4 px-lg-5">
        <h1 class="m-0">Superar</h1>
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
                        <h5 style="color: white;">Nome do cliente:</h5>
                    </div>
                    <div class="col-auto">
                        <div class="autocomplete-wrapper">
                            <div class="col-auto">
                                <input type="text" id="search" id="pesqnome" name="pesqnome" class="form-control" placeholder="Nome..." style="width: 500px;" value="<?php echo $pesqnome; ?>">
                            </div>
                            <div id="suggestions"></div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="cliselect.php" class="btn btn-secondary rounded-pill py-2 px-3">Limpar</a>
                        <button class="btn btn-secondary rounded-pill py-2 px-3" type="submit" name="submit">Pesquisar</button>
                        <a href="cliinsert.php" class="btn btn-secondary rounded-pill py-2 px-3">Inclusão</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="table-container">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <?php 
                    $lista = ['Nome', 'Email', 'Whatsapp', 'Endereço', 'Bairro', 'Cidade', 'UF', 'Operações'];
                    for ($lc=0; $lc < count($lista); $lc++) { 
                        echo"<th scope='col'>" . $lista[$lc] . "</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // formatando a data (YYYY-MM-DD → DD/MM/YYYY)

                        echo "<tr>
                  <td>{$row['nome']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['whatsapp']}</td>
                  <td>{$row['endereco']}</td>
                  <td>{$row['bairro']}</td>
                  <td>{$row['cidade']}</td>
                  <td>{$row['uf']}</td>

                  <td>
                      <a href='cliupdate.php?updateid={$row['id']}' class='btn btn-sm btn-primary'>
                        <i class='bi bi-pencil-square'></i> Alterar
                      </a>
                      <a href='clidelete.php?deleteid={$row['id']}' class='btn btn-sm btn-danger'>
                        <i class='bi bi-trash'></i> Excluir
                      </a>
                  </td>
                </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>Nenhuma despesa encontrada.</td></tr>";
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
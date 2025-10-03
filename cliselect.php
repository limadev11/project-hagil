<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Query SQL padrão para listar todos os usuários
$sql = "SELECT id, nome, email, whatsapp, endereco, bairro, cidade, uf FROM cliente WHERE 1=1";

// Área que vai efetuar a pesquisa pelo nome do cliente
$pesqnome = '';
$pesqemail = '';
$pesqzap = '';
$pesqend = '';
$pesqbairro = '';
$pesqcidade = '';
$pesquf = '';
if (isset($_POST['submit'])) {
    $pesqnome = mysqli_real_escape_string($con, $_POST['pesqnome']);
    $pesqemail = mysqli_real_escape_string($con, $_POST['pesqemail']);
    $pesqzap = mysqli_real_escape_string($con, $_POST['pesqzap']);
    $pesqend = mysqli_real_escape_string($con, $_POST['pesqend']);
    $pesqbairro = mysqli_real_escape_string($con, $_POST['pesqbairro']);
    $pesqcidade = mysqli_real_escape_string($con, $_POST['pesqcidade']);
    $pesquf = mysqli_real_escape_string($con, $_POST['pesquf']);
    // Consulta para buscar produto com base no nome fornecido
    if (!empty($pesqnome)) {
        $sql .= " AND nome LIKE '%$pesqnome%'";
    }
    if (!empty($pesqemail)) {
        $sql .= " AND email like '%$pesqemail%'";
    }
    if (!empty($pesqzap)) {
        $sql .= " AND whatsapp like '%$pesqzap%'";
    }
    if (!empty($pesqend)) {
        $sql .= " AND endereco like  '%$pesqend%'";
    }
    if (!empty($pesqbairro)) {
        $sql .= " AND bairro like '%$pesqbairro%'";
    }
    if (!empty($pesqcidade)) {
        $sql .= " AND cidade like '%$pesqcidade%'";
    }
    if (!empty($pesquf)) {
        $sql .= " AND uf like '%$pesquf%'";
    }
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


</head>

<body>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <center>
        <div class="row">
            <nav class="navbar navbar-expand-lg  navbar-light sticky-top px-4 px-lg-5">
                <div class="col">
                    <h1 class="m-0">Superar</h1>
                </div>
                <div class="col">
                    <form method="post" action="" style="width: 1050px; padding: 5px; display: flex; align-items: flex-start; gap: 15px; 
                    background-color: #556152; border-radius: 10px;">
                        <div style="flex: 1;">
                            <!-- Aqui são todos os campos que o cliente irá preencher para fazer a pesquisa e filtrar os resultados -->
                            <!-- Aqui são todos os campos que o cliente irá preencher para fazer a pesquisa e filtrar os resultados -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5 style="margin-top:5px">Nome:</h5>
                                        <input type="text" name="pesqnome" placeholder="Nome..."
                                            style="height:30px; margin-top:5px" maxlength="37"
                                            value="<?php echo $pesqnome; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5>Email:</h5>
                                        <input type="text" name="pesqemail" placeholder="Nome..." style="height:30px;"
                                            maxlength="37" value="<?php echo $pesqemail; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5>Whatsapp:</h5>
                                        <input type="text" name="pesqzap" placeholder="Nome..." style="height:30px"
                                            maxlength="37" value="<?php echo $pesqzap; ?>">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-row">
                                            <h5>Endereço:</h5>
                                            <input type="text" name="pesqend" placeholder="Nome..." style="height:30px"
                                                maxlength="37" value="<?php echo $pesqend; ?>">
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5>Bairro:</h5>
                                        <input type="text" name="pesqbairro" placeholder="Nome..." style="height:30px"
                                            maxlength="37" value="<?php echo $pesqbairro; ?>">
                                    </div>
                                    
                                    <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5>Cidade:</h5>
                                        <input type="text" name="pesqcidade" placeholder="Nome..." style="height:30px"
                                            maxlength="37" value="<?php echo $pesqcidade; ?>">
                                    </div>
                                    
                                    <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5>UF:</h5>
                                        <input type="text" name="pesquf" placeholder="Nome..." style="height:30px"
                                            maxlength="37" value="<?php echo $pesquf; ?>">
                                    </div>
                                    


                                    
                        


                        </div>

                        <!-- Aqui fica os 3 botões principais: Pesquisar (de acordo com os valores nos campos), Limpar os valores inseridos e 
            entrar na área de incluir nova venda -->
                        <div style="display: flex; flex-direction: column; gap: 10px;">
                            <button class="btn btn-secondary rounded-pill py-2 px-3" type="submit"
                                name="submit">Pesquisar</button>
                            <a href="cliselect.php" class="btn btn-secondary rounded-pill py-2 px-3">Limpar</a>
                            <a href="cliinsert.php" class="btn btn-secondary rounded-pill py-2 px-3">Incluir</a>
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

    <div class="table-container">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <?php 
                    $lista = ['Nome', 'Email', 'Whatsapp', 'Endereço', 'Bairro', 'Cidade', 'UF', 'Operações'];
                    for ($lc=0; $lc < count($lista) ; $lc++) {
                    echo "<th scope='col'>". $lista[$lc] ."</th>";
                        
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
 <script>
        $(document).ready(function() {
            $('#search').keyup(function() {
                let query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: 'searchcliente.php', // Arquivo PHP que você criou
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

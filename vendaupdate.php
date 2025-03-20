<?php
session_start();
include('verificalogin.php');
include('connect.php');

$id = $_GET['updateid'];
$sql = 'select v.id,e.id idv, e.nome vendedor,  p.id idp, p.nome produto, v.quantidade,v.valortotal, v.preco, v.datavenda, v.vlrcomissao, v.vlddesconto
    from venda v inner join vendedor e on e.id=v.idvendedor
                 inner join produto p on p.id = v.idproduto';
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$quantidade = $row['quantidade'];
$preco = $row['preco'];
$datavenda = $row['datavenda'];
$vlrcomissao =  str_replace(',', '.', $row['vlrcomissao']);
$vlddesconto = $row['vlddesconto'];
$idproduto =  $row['idp'];
$idvendedor =  $row['idv'];
if (isset($_POST['submit'])) {
    $quantidade = $_POST['quantidade'];
    $preco = str_replace(',', '.', $_POST['preco']);
    $datavenda = $_POST['datavenda'];
    $vlrcomissao = str_replace(',', '.', $_POST['vlrcomissao']);
    $vlddesconto = str_replace(',', '.', $_POST['vlddesconto']);
    $idproduto =  $_POST['idproduto'];
    $idvendedor =  $_POST['idvendedor'];
    $sql = 'update venda set idproduto = ' .  $idproduto . ', idvendedor=' . $idvendedor . 
     ', quantidade=' . $quantidade . ', preco=' . $preco . ', datavenda="' . $datavenda . 
     '", vlrcomissao=' . $vlrcomissao . ', vlddesconto=' . $vlddesconto . 
        ' where id =' . $id;
    echo $sql;
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location: vendaselect.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Atualizar Produto</title>
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
</head>

<body>


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
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
                <h2 style="color: rgb(255, 255, 255); font-size: 2.5rem;">Atualizar da Venda:</h2>
            </div>
        </div>

        <div class="container" style="background-color: #556152;">
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <div class="row" style="background-color: #556152;">
                    <div class="col-12"> <br><br>
                        <div class="form-floating" style="width: 400px; margin-left: 300p;">
                            <h4 style="color: white;">Dados do Produto:</h4>
                        </div>
                    </div>
                    <!-- Nome do Produto -->
                    <div class="col"> <br><br>
                        <div class="form-floating" style="width: 400px;">
                            <h5 style="color: white;">Nome do Produto:</h5>
                        </div>
                    </div>
                    <div class="col" style="margin-right: 520px;"> <br><br>
                        <?php
                        $sqll = 'select * from produto order by id';
                        $result = mysqli_query($con, $sqll);
                        if ($result) {
                            echo '<select  name="idproduto" class="form-control">';
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($idproduto == $row['id']) {
                                    echo '<option value="' . $row['id'] . '" selected>' .
                                        $row['nome'] . '</option>';
                                } else {
                                    echo '<option value="' . $row['id'] . '" >' .
                                        $row['nome'] . '</option>';
                                }
                            }
                            echo '</select>';
                        }
                        ?>
                    </div>
                    <!-- Fim Nome do Produto -->
                    <!-- Nome do Vendedor -->
                    <div class="col"> <br><br>
                        <div class="form-floating" style="width: 400px;">
                            <h5 style="color: white;">Vendedor:</h5>
                        </div>
                    </div>
                    <div class="col" style="margin-right: 520px;"> <br><br>
                        <?php
                        $sqll = 'select * from vendedor order by id';
                        $result = mysqli_query($con, $sqll);
                        if ($result) {
                            echo '<select 
                                                name="idvendedor" class="form-control">';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id'] . '">' .
                                    $row['nome'] . '</option>';
                            }
                            echo '</select>';
                        }
                        ?>
                    </div>
                    <!-- Fim Preço -->
                    <!-- Preço -->
                    <div class="col"> <br><br>
                        <div class="form-floating" style="width: 400px;">
                            <h5 style="color: white;">Preço:</h5>
                        </div>
                    </div>
                    <div class="col" style="margin-right: 520px;"> <br><br>
                        <input type="text" class="form-control" name="preco" id="preco" value="<?php echo $preco; ?>" required style="width: 350px;">
                    </div>
                    <!-- Fim Preço -->
                    <!-- Quantidade -->
                    <div class="col"> <br><br>
                        <div class="form-floating" style="width: 400px;">
                            <h5 style="color: white;">Quantidade:</h5>
                        </div>
                    </div>
                    <div class="col" style="margin-right: 520px;"> <br><br>
                        <input type="text" class="form-control" name="quantidade" id="quantidade" value="<?php echo $quantidade; ?>" required style="width: 350px;">
                    </div>
                    <!-- Fim Quantidade -->
                    <!-- Data de Venda -->
                    <div class="col"> <br><br>
                        <div class="form-floating" style="width: 400px;">
                            <h5 style="color: white;">Data da venda:</h5>
                        </div>
                    </div>
                    <div class="col" style="margin-right: 520px;"> <br><br>
                        <input type="date" class="form-control" name="datavenda" id="datavenda" value="<?php echo $datavenda; ?>" required style="width: 350px;">
                    </div>
                    <!-- Comissão -->
                    <div class="col"> <br><br>
                        <div class="form-floating" style="width: 400px;">
                            <h5 style="color: white;">Comissão:</h5>
                        </div>
                    </div>
                    <div class="col" style="margin-right: 520px;"> <br><br>
                        <input type="text" class="form-control" name="vlrcomissao" id="vlrcomissao" value="<?php echo $vlrcomissao; ?>" required style="width: 350px;">
                    </div>
                    <!-- Fim Comissão -->
                    <!-- Desconto -->
                    <div class="col"> <br><br>
                        <div class="form-floating" style="width: 400px;">
                            <h5 style="color: white;">Desconto:</h5>
                        </div>
                    </div>
                    <div class="col" style="margin-right: 520px;"> <br><br>
                        <input type="text" class="form-control" name="vlddesconto" id="vlddesconto" value="<?php echo $vlddesconto; ?>" required style="width: 350px;">
                    </div>
                    <!-- </div>ROw -->
                    <br><br>
                    <div class="row" style="background-color: #556152;">
                        <div class="col">
                            <?php
                            echo
                            "<a href='vendaselect.php'color:white;'>
                                <button type='button' style='padding: 9px; width: 100px;'
                                class='btn btn-dark'>Não, Voltar</button></a>";
                            ?>
                            <button class="btn btn-secondary rounded-pill py-3 px-5" type="submit" name="submit">Atualizar</button>
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
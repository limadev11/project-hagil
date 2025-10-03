<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Query SQL padrão para listar todas as admissao
$sql = 'select "Venda" tipo, v.id, c.nome, v.valortotal as valortotal, v.datavenda as data
        from venda v inner join cliente c on c.id = v.idcliente
        union all
        select "Despesa" tipo, d.id, t.nome, d.valor as valortotal, d.data as data
        from despesa d inner join tipodespesa t on t.id = d.idtipodespesa
        order by 3';
        
$sqltv = "select sum(v.valortotal) total
        from venda v inner join cliente c on c.id = v.idcliente";

$sqltd = "select sum(d.valor) total
from despesa d inner join tipodespesa t on t.id = d.idtipodespesa";


// Algoritmo que identifica a ação do botão submit, declara as variáveis anteriores ao valor que usuário.
if (isset($_POST['submit'])) {

    // Fazer o filtro de pesquisa somente a Tipo = Venda ou Tipo = Despesa
    $pesqtv = isset($_POST['vendas']);
    $pesqtd = isset($_POST['despesas']);

    if (!empty($pesqtv) && empty($pesqtd)){
        $sql = "select 'Venda' tipo, v.id, c.nome, v.valortotal as valortotal, v.datavenda as data
        from venda v inner join cliente c on c.id = v.idcliente";
    }
    else if (!empty($pesqtd) && empty($pesqtv)){
        $sql = "select 'Despesa' tipo, d.id, t.nome, d.valor as valortotal, d.data as data
        from despesa d inner join tipodespesa t on t.id = d.idtipodespesa";
    }
}
$result = mysqli_query($con, $sql);
$resultTV = mysqli_query($con, $sqltv);
$resultTD = mysqli_query($con, $sqltd);

// A variável $rowTV agora vai receber todos os resultados da variavel $resultTV
if ($resultTV && mysqli_num_rows($resultTV) > 0) {
    $rowTV = mysqli_fetch_assoc($resultTV);
}
// A variável $rowTD agora vai receber todos os resultados da variavel $resultTD
if ($resultTD && mysqli_num_rows($resultTD) > 0) {
    $rowTD = mysqli_fetch_assoc($resultTD);
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col" style="width:500px">
                                    <h5>Tipo:</h5>
                                    <input type="checkbox" name="vendas" value="on">
                                    <label for="vendas">Vendas</label><br>

                                    <input type="checkbox" name="despesas" value="on">
                                    <label for="despesas">Despesas</label><br>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-row">
                                    <h5>Vendas Totais:</h5>
                                    <input type="text" style="height:30px"
                                        maxlength="37" value="<?php echo $rowTV['total']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-row">
                                    <h5>Despesas Totais:</h5>
                                    <input type="text" style="height:30px"
                                        maxlength="37" value="<?php echo $rowTD['total']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <button class="btn btn-secondary rounded-pill py-2 px-3" type="submit"
                            name="submit">Pesquisar</button>
                        <a href="consultageral.php" class="btn btn-secondary rounded-pill py-2 px-3">Limpar</a>
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
                <th scope="col" style="background-color: #404A3D; color: white;">Tipo</th>
                <th scope="col" style="background-color: #404A3D; color: white;">ID</th>
                <th scope="col" style="background-color: #404A3D; color: white;">Nome do Cliente</th>
                <th scope="col" style="background-color: #404A3D; color: white;">Valor Total</th>
                <th scope="col" style="background-color: #404A3D; color: white;">Data</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                    <td>" . $row['tipo'] . "</td>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['nome'] . "</td>
                    <td>" . $row['valortotal'] . "</td>
                    <td>" . date('d/m/Y', strtotime($row['data'])) . "</td>
              </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum ad encontrado.</td></tr>";
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
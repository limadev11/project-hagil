<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Query SQL padrão para listar toda a consulta geral para as tabelas
$sql = 'select "Venda" tipo, v.id, c.nome, v.valortotal as valortotal, v.datavenda as data
        from venda v inner join cliente c on c.id = v.idcliente
        union all
        select "Despesa" tipo, d.id, t.nome, d.valor as valortotal, d.data as data
        from despesa d inner join tipodespesa t on t.id = d.idtipodespesa
        order by 3';

// Este SQL Padrão serve para contar todas as vendas registradas
$sqltv = "select sum(v.valortotal) total
        from venda v inner join cliente c on c.id = v.idcliente";

// Este SQL Padrão serve para contar todas as despesas registradas
$sqltd = "select sum(d.valor) total
from despesa d inner join tipodespesa t on t.id = d.idtipodespesa";



// Algoritmo que identifica a ação do botão submit, declara as variáveis anteriores ao valor que usuário.
if (isset($_POST['submit'])) {

    // Fazer o filtro de pesquisa somente a Tipo = Venda ou Tipo = Despesa
    $pesqtv = isset($_POST['vendas']);
    $pesqtd = isset($_POST['despesas']);

    $pesqdata1 = mysqli_real_escape_string($con, $_POST['pesqdata1']);
    $pesqdata2 = mysqli_real_escape_string($con, $_POST['pesqdata2']);
    // Aqui é para trocar as / na data para - e trocar as posições dos números, ficando 0000-00-00 (padrão MYSQL)
    $pesqdata1 = implode("-", array_reverse(explode("/", $pesqdata1)));
    $pesqdata2 = implode("-", array_reverse(explode("/", $pesqdata2)));

    // Área de exibir só a Venda
    if (!empty($pesqtv) && empty($pesqtd)){
        $sql = "select 'Venda' tipo, v.id, c.nome, v.valortotal as valortotal, v.datavenda as data
        from venda v inner join cliente c on c.id = v.idcliente";

        // Parte de filtrar por data:
        if(!empty($pesqdata1) && empty($pesqdata2)){
            $sql = $sql . " where v.datavenda between '$pesqdata1' and '3000-01-01'";
        }
        if(!empty($pesqdata2) && empty($pesqdata1)){
            $sql = $sql . " where v.datavenda between '0000-01-01' and '$pesqdata2'";
        }
        else {
            $sql = $sql . " where v.datavenda between '$pesqdata1' and '$pesqdata2'";
        }
        echo $sql;
    }
    // Área de exibir só a Despesa
    else if (!empty($pesqtd) && empty($pesqtv)){
        $sql = "select 'Despesa' tipo, d.id, t.nome, d.valor as valortotal, d.data as data
        from despesa d inner join tipodespesa t on t.id = d.idtipodespesa";
        // Parte de filtrar por data:
        if(!empty($pesqdata1) && empty($pesqdata2)){
            $sql = $sql . " where d.datavenda between '$pesqdata1' and '3000-01-01'";
        }
        if(!empty($pesqdata2) && empty($pesqdata1)){
            $sql = $sql . " where d.datavenda between '0000-01-01' and '$pesqdata2'";
        }
        else {
            $sql = $sql . " where v.datavenda between '$pesqdata1' and '$pesqdata2'";
        }
        echo $sql;
    }
    // Parte de filtrar por data:
    if(!empty($pesqdata1) && empty($pesqdata2)){
        $sql = $sql . " where v.datavenda between '$pesqdata1' and '3000-01-01'";
    }
    if(!empty($pesqdata2) && empty($pesqdata1)){
        $sql = $sql . " where v.datavenda between '0000-01-01' and '$pesqdata2'";
    }
    else {
        $sql = $sql . " where v.datavenda between '$pesqdata1' and '$pesqdata2'";
    }
    echo $sql;
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
                <form method="post" action="" style="width: 1050px; padding: 10px; display: flex; justify-content: space-between; align-items: flex-start; gap: 20px; 
           background-color: #556152; border-radius: 10px;">

                    <!-- Coluna principal -->
                    <div style="flex: 1; display: flex; flex-direction: column; gap: 15px;">

                        <!-- Linha Tipo e Data -->
                        <div style="display: flex; justify-content: space-between; align-items: center; gap: 30px;">

                            <!-- Tipo -->
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <h5 style="color:white;">Tipo:</h5>
                                <h5 style="color:white;">
                                    <input type="checkbox" name="vendas" value="on" style="margin-top:0px"> Vendas
                                </h5>
                                <h5 style="color:white;">
                                    <input type="checkbox" name="despesas" value="on" style="margin-top:0px"> Despesas
                                </h5>
                            </div>

                            <!-- Data -->
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <h5 style="color:white; margin:0;">Data:</h5>
                                <input class="data-input" type="date" name="pesqdata1" style="height:30px; width:120px"
                                    value="<?php echo $pesqdata1; ?>">
                                <h5 style="color:white; margin:0;">ao</h5>
                                <input class="data-input" type="date" name="pesqdata2" style="height:30px; width:120px"
                                    value="<?php echo $pesqdata2; ?>">
                            </div>
                        </div>

                        <!-- Linha Totais -->
                        <div style="display: flex; justify-content: space-between; gap: 30px;">

                            <div style="display: flex; align-items: center; gap: 10px;">
                                <h5 style="color:white; margin:0;">Vendas Totais:</h5>
                                <input type="text" style="height:30px" value="<?php echo $rowTV['total']; ?>" readonly>
                            </div>

                            <div style="display: flex; align-items: center; gap: 10px;">
                                <h5 style="color:white; margin:0;">Despesas Totais:</h5>
                                <input type="text" style="height:30px" value="<?php echo $rowTD['total']; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Coluna Botões -->
                    <div style="display: flex; flex-direction: column; gap: 10px; align-items: flex-end;">
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
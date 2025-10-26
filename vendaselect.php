<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Query SQL padrão para listar todos campos da tabela venda
$sql = "select v.id, p.nome produto, ve.nome vendedor, cli.nome cliente,
        v.precocusto, v.preco, v.quantidade, v.datavenda, v.valortotal
        from venda v
        inner join produto p
        on p.id = v.idproduto
        inner join vendedor ve
        on ve.id = v.idvendedor
        inner join cliente cli
        on cli.id = v.idcliente";


// Variáveis que serão usadas para as pesquisas
$pesqvend = '';
$pesqcliente = '';
$pesqproduto = '';
$pesqdata1 = '';
$pesqdata2 = '';
// Algoritmo que identifica a ação do botão submit, declara as variáveis anteriores ao valor que usuário.
if (isset($_POST['submit'])) {
    $pesqvend = mysqli_real_escape_string($con, $_POST['pesqvend']);
    $pesqcliente = mysqli_real_escape_string($con, $_POST['pesqcliente']);
    $pesqproduto = mysqli_real_escape_string($con, $_POST['pesqproduto']);
    $pesqdata1 = mysqli_real_escape_string($con, $_POST['pesqdata1']);
    $pesqdata2 = mysqli_real_escape_string($con, $_POST['pesqdata2']);
    // Aqui é para trocar as / na data para - e trocar as posições dos números, ficando 0000-00-00 (padrão MYSQL)
    $pesqdata1 = implode("-", array_reverse(explode("/", $pesqdata1)));
    $pesqdata2 = implode("-", array_reverse(explode("/", $pesqdata2)));
    if (empty($pesqdata1) && empty($pesqdata2)) {
        $sql = $sql . " where ve.nome like '%$pesqvend%' and p.nome like '%$pesqproduto%' and 
        cli.nome like '%$pesqcliente%'";
    } else if (empty($pesqdata1) || empty($pesqdata2)) {
        if (empty($pesqdata1)){
        $pesqdata1 = $pesqdata2;
        }
        if (empty($pesqdata2)){
            $pesqdata2 = $pesqdata1;
        }
        // Depois de todos os valores declarados, será feito outro SQL porém com o filtro de pesquisa.
        $sql = $sql . " where ve.nome like '%$pesqvend%' and p.nome like '%$pesqproduto%' and 
        cli.nome like '%$pesqcliente%' and v.datavenda like '%$pesqdata1%' or v.datavenda like '%$pesqdata2%'";
    } else {
        $sql = $sql . " where ve.nome like '%$pesqvend%' and p.nome like '%$pesqproduto%' and 
        cli.nome like '%$pesqcliente%' and v.datavenda between '$pesqdata1' and '$pesqdata2'";
    }
}

// Aqui transfirá o resultado do $sql para a variável result
$result = mysqli_query($con, $sql);
?>

<!-- Link para puxar os href dos ícones de "Alterar" e "Excluir" -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<!-- Bootstrap para customizar o site -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Estilo do template CSS -->
<link href="css/style.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Superar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
</head>

<body>
    <!-- Page Header Start -->
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
                                    <input type="text" name="pesqvend" placeholder="Nome..." id="testvend"
                                        style="height:30px; margin-top:5px" maxlength="37"
                                        value="<?php echo $pesqvend; ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-row">
                                    <h5>Cliente:</h5>
                                    <input type="text" name="pesqcliente" placeholder="Nome..." style="height:30px;" id="testcli"
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
    <div class="table-container">
        <table class="table table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <!-- Aqui é uma lista de todos os campos que irão aparecer na tabela -->
                    <?php
                    $listcolumn = ['ID', 'Vendedor', 'Cliente', 'Produto', 'Quantd.', 'Preço Custo', 'Preço Venda', 'Total', 'Data', 'Operações'];
                    /** Aqui é uma estrutura de repetição utilizando o vetor $listcolumn e a variável $lc, tem objetivo de
                     * simplifica na hora de colocar cada coluna e seu nome, sendo $lc o índice do vetor $listcomun (agora não tem ctrl+C e V)
                     */
                    for ($lc = 0; $lc < count($listcolumn); $lc++) {
                        echo "<th scope='col' style='background-color: #404A3D; color: white; width:20px'>" . $listcolumn[$lc] . "</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Esta parte é para formatar a variável $datavenda do padrão mysql para o padrão brasileiro 00/00/2000
                        $datavenda = date('d/m/Y', strtotime($row['datavenda']));
                        // Aqui está atribuindo os valores puxadas no banco de dados para as colunas feitas anteriormente 
                        // (a estrutura de repetição)
                        echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['vendedor'] . "</td>
                            <td>" . $row['cliente'] . "</td>                
                            <td>" . $row['produto'] . "</td>
                            <td>" . $row['quantidade'] . "</td>
                            <td>" . $row['precocusto'] . "</td>
                            <td>" . $row['preco'] . "</td>
                            <td>" . $row['valortotal'] . "</td>
                            <td>" . date('d/m/Y', strtotime($row['datavenda'])) . "</td>
                            <td>
                              <a href='vendaupdate.php?updateid={$row['id']}' class='btn btn-sm btn-primary'>
                                <i class='bi bi-pencil-square'></i> Alterar
                              </a>
                              <a href='vendadelete.php?deleteid={$row['id']}' class='btn btn-sm btn-danger'>
                                <i class='bi bi-trash'></i> Excluir
                              </a>
                            </td>
                          </tr>";
                        //   Depois do date('d/m/Y')... estão os botões vendaupdate e vendadelete para trocar a área de ver as vendas
                        //   para as áreas de alterar alguma venda ou excluir alguma venda.
                    }
                } else {
                    echo "<tr><td colspan='11'>Nenhuma venda registrada.</td></tr>";
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
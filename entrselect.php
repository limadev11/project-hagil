<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Query SQL padrão para listar todas as entradas
$sql = 'SELECT e.id, p.nome, e.dataentrada AS data, e.preco, e.quantidade 
        FROM entradaestoque e
        INNER JOIN produto p ON p.id = e.idproduto
        WHERE 1=1';

// Variáveis de pesquisa
$pesqnome = '';
$pesqpreco = '';
$pesqquant = '';
$pesqdata = '';

if (isset($_POST['submit'])) {
    $pesqnome = mysqli_real_escape_string($con, $_POST['pesqnome']);
    $pesqpreco = mysqli_real_escape_string($con, $_POST['pesqpreco']);
    $pesqquant = mysqli_real_escape_string($con, $_POST['pesqquant']);
    $pesqdata = mysqli_real_escape_string($con, $_POST['pesqdata']);

    // Filtros dinâmicos
    if (!empty($pesqnome)) {
        $sql .= " AND p.nome LIKE '%$pesqnome%'";
    }
    if (!empty($pesqpreco)) {
        $sql .= " AND e.preco = '$pesqpreco'";
    }
    if (!empty($pesqquant)) {
        $sql .= " AND e.quantidade = '$pesqquant'";
    }
    if (!empty($pesqdata)) {
        // Converter dd/mm/yyyy para yyyy-mm-dd
        $partes = explode("/", $pesqdata);
        if (count($partes) == 3) {
            $dataFormatada = $partes[2] . "-" . $partes[1] . "-" . $partes[0];
            $sql .= " AND e.dataentrada = '$dataFormatada'";
        }
    }
}

$sql .= " ORDER BY p.nome ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Superar - Entradas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Icones e CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <center>
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light sticky-top px-4 px-lg-5">
                <div class="col">
                    <h1 class="m-0">Superar</h1>
                </div>

                <div class="col">
                    <form method="post" action="" style="width:1050px; padding:5px; display:flex; align-items:flex-start; gap:15px; background-color:#556152; border-radius:10px;">
                        <div style="flex:1;">
                            <!-- Campos de pesquisa -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5 style="margin-top:5px; color:white;">Nome:</h5>
                                        <input type="text" name="pesqnome" placeholder="Nome..." style="height:30px; margin-top:5px" maxlength="37" value="<?php echo $pesqnome; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5 style="margin-top:5px; color:white;">Preço:</h5>
                                        <input type="text" name="pesqpreco" placeholder="Preço..." style="height:30px; margin-top:5px" maxlength="37" value="<?php echo $pesqpreco; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5 style="margin-top:5px; color:white;">Quantidade:</h5>
                                        <input type="text" name="pesqquant" placeholder="Quantidade..." style="height:30px; margin-top:5px" maxlength="10" value="<?php echo $pesqquant; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5 style="margin-top:5px; color:white;">Data:</h5>
                                        <input type="text" name="pesqdata" placeholder="dd/mm/aaaa" style="height:30px; margin-top:5px" maxlength="10" value="<?php echo $pesqdata; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botões -->
                        <div style="display:flex; flex-direction:column; gap:10px;">
                            <button class="btn btn-secondary rounded-pill py-2 px-3" type="submit" name="submit">Pesquisar</button>
                            <a href="entrselect.php" class="btn btn-secondary rounded-pill py-2 px-3">Limpar</a>
                            <a href="entrinsert.php" class="btn btn-secondary rounded-pill py-2 px-3">Incluir</a>
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

    <!-- Tabela de resultados -->
    <div class="table-container">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Produto</th>
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
                        $dataentrada = !empty($row['data']) ? date("d/m/Y", strtotime($row['data'])) : "-";
                        $preco = "R$ " . number_format($row['preco'], 2, ',', '.');

                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nome']}</td>
                                <td>{$dataentrada}</td>
                                <td>{$preco}</td>
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
                    echo "<tr><td colspan='6' class='text-center'>Nenhuma entrada encontrada.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

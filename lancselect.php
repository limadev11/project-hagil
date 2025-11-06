<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Query SQL padrão para listar todas as despesas
$sql = 'SELECT d.id, td.nome, d.data, d.valor, d.observacao 
        FROM despesa d
        INNER JOIN tipodespesa td ON td.id = d.idtipodespesa
        '; 
// Variáveis de pesquisa
$pesqnome = '';
$pesqvalor = '';
$pesqdata = '';

if (isset($_POST['submit'])) {
    $pesqnome = mysqli_real_escape_string($con, $_POST['pesqnome']);
    $pesqvalor = mysqli_real_escape_string($con, $_POST['pesqvalor']);
    $pesqdata = mysqli_real_escape_string($con, $_POST['pesqdata']);

    // Filtros dinâmicos
    if (!empty($pesqnome)) {
        $sql .= " AND td.nome LIKE '%$pesqnome%'";
    }
    if (!empty($pesqvalor)) {
        $sql .= " AND d.valor = '$pesqvalor'";
    }
    if (!empty($pesqdata)) {
        
        
            $sql .= " AND d.data = '$pesqdata'";
       
    }
    
}

$sql .= " ORDER BY td.nome ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Superar - Despesas</title>
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
                                        <h5 style="margin-top:5px; color:white;">Valor:</h5>
                                        <input type="text" name="pesqvalor" placeholder="Valor..." style="height:30px; margin-top:5px" maxlength="37" value="<?php echo $pesqvalor; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5 style="margin-top:5px; color:white;">Data:</h5>
                                        <input type="date" name="pesqdata" placeholder="dd/mm/aaaa" style="height:30px; margin-top:5px" maxlength="10" value="<?php echo $pesqdata; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botões -->
                        <div style="display:flex; flex-direction:column; gap:10px;">
                            <button class="btn btn-secondary rounded-pill py-2 px-3" type="submit" name="submit">Pesquisar</button>
                            <a href="lancselect.php" class="btn btn-secondary rounded-pill py-2 px-3">Limpar</a>
                            <a href="lancinsert.php" class="btn btn-secondary rounded-pill py-2 px-3">Incluir</a>
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
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Data da Despesa</th>
                    <th scope="col">Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $datadespesa = !empty($row['data']) ? date("d/m/Y", strtotime($row['data'])) : "-";
                        $valor = "R$ " . number_format($row['valor'], 2, ',', '.');

                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nome']}</td>
                                <td>{$valor}</td>
                                <td>{$row['observacao']}</td>
                                <td>{$datadespesa}</td>
                                <td>
                                    <a href='lancupdate.php?updateid={$row['id']}' class='btn btn-sm btn-primary'>
                                        <i class='bi bi-pencil-square'></i> Alterar
                                    </a>
                                    <a href='lancdelete.php?deleteid={$row['id']}' class='btn btn-sm btn-danger'>
                                        <i class='bi bi-trash'></i> Excluir
                                    </a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Nenhuma despesa encontrada.</td></tr>";
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

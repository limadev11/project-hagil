<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Query SQL padrão
$sql = "SELECT * FROM usuario WHERE 1=1";

// Variáveis de pesquisa
$pesqnome = '';
$pesqemail = '';
$pesqadmin = '';

if (isset($_POST['submit'])) {
    $pesqnome  = mysqli_real_escape_string($con, $_POST['pesqnome'] ?? '');
    $pesqemail = mysqli_real_escape_string($con, $_POST['pesqemail'] ?? '');
    $pesqadmin = mysqli_real_escape_string($con, $_POST['pesqadmin'] ?? '');

    // Filtros dinâmicos
    if (!empty($pesqnome)) {
        $sql .= " AND nome LIKE '%$pesqnome%'";
    }
    if (!empty($pesqemail)) {
        $sql .= " AND email LIKE '%$pesqemail%'";
    }
    if (!empty($pesqadmin)) {
        $sql .= " AND master = '$pesqadmin'";
    }
}

$sql .= " ORDER BY nome ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Superar - Usuários</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

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
                    <!-- Formulário de pesquisa -->
                    <form method="post" action="" style="width:1050px; padding:5px; display:flex; align-items:flex-start; gap:15px; background-color:#556152; border-radius:10px;">
                        <div style="flex:1;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5 style="margin-top:5px; color:white;">Nome:</h5>
                                        <input type="text" name="pesqnome" placeholder="Nome..." style="height:30px; margin-top:5px" maxlength="60" value="<?php echo $pesqnome; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5 style="margin-top:5px; color:white;">E-Mail:</h5>
                                        <input type="text" name="pesqemail" placeholder="E-Mail..." style="height:30px; margin-top:5px" maxlength="60" value="<?php echo $pesqemail; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <h5 style="margin-top:5px; color:white;">Administrador:</h5>
                                        <select name="pesqadmin" style="height:30px; margin-top:5px; width:100%;">
                                            <option value="">Todos</option>
                                            <option value="S" <?php if ($pesqadmin == 'S') echo 'selected'; ?>>Sim</option>
                                            <option value="N" <?php if ($pesqadmin == 'N') echo 'selected'; ?>>Não</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botões -->
                        <div style="display:flex; flex-direction:column; gap:10px;">
                            <button class="btn btn-secondary rounded-pill py-2 px-3" type="submit" name="submit">Pesquisar</button>
                            <a href="ususelect.php" class="btn btn-secondary rounded-pill py-2 px-3">Limpar</a>
                            <a href="usuinsert.php" class="btn btn-secondary rounded-pill py-2 px-3">Incluir</a>
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

    <!-- Tabela de resultados (inalterada) -->
    <div class="table-container">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Administrador</th>
                    <th scope="col">Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nome']}</td>
                                <td>{$row['email']}</td>
                                <td>" . ($row['master'] == 'S' ? 'Sim' : 'Não') . "</td>
                                <td>
                                    <a href='usuupdate.php?updateid={$row['id']}' class='btn btn-sm btn-primary'>
                                        <i class='bi bi-pencil-square'></i> Alterar
                                    </a>
                                    <a href='usudelete.php?deleteid={$row['id']}' class='btn btn-sm btn-danger'>
                                        <i class='bi bi-trash'></i> Excluir
                                    </a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Nenhum usuário encontrado.</td></tr>";
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

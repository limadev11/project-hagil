<?php
session_start();
include('verificalogin.php');
include('connect.php');

$id = $_GET['deleteid'] ?? 0;

// Buscar dados da venda
$sql = "SELECT v.id, p.nome AS produto, ve.nome AS vendedor, 
               v.quantidade, v.datavenda 
        FROM venda v
        INNER JOIN produto p ON p.id = v.idproduto
        INNER JOIN vendedor ve ON ve.id = v.idvendedor
        WHERE v.id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("<h3>Venda não encontrada.</h3>");
}

$produto = $row['produto'];
$vendedor = $row['vendedor'];
$quantidade = $row['quantidade'];
$datavenda = $row['datavenda'];

// Deletar venda
if (isset($_POST['submit'])) {
    $sql = "DELETE FROM venda WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location: vendaselect.php');
        exit;
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Venda</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Cabeçalho -->
    <header class="jumbotron">
        <h1 class="fw-bold">Painel de Gestão</h1>
        <p>Excluir venda do sistema</p>
    </header>

    <!-- Menu principal -->
    <nav class="menu-container">
        <ul class="menu">
            <li><a href="clienteselect.php">Clientes</a></li>
            <li><a href="produtoselect.php">Produtos</a></li>
            <li><a href="vendedorselect.php">Vendedores</a></li>
            <li><a href="vendaselect.php">Vendas</a></li>
            <li><a href="menu.php">Menu</a></li>
        </ul>
    </nav>

    <!-- Conteúdo principal -->
    <main>
        <div class="container-form-post">
            <div class="text-center mx-auto">
                <div class="container p-3">
                    <div class="container text-center py-2">
                        <h1>Excluir Venda</h1>
                        <p class="text-danger fw-semibold">Atenção! Esta ação é permanente e não pode ser desfeita.</p>
                    </div>

                    <form method="post" class="mt-3">
                        <h4>Dados da Venda</h4>

                        <!-- Produto -->
                        <div class="mb-3">
                            <label for="produto">Produto:</label>
                            <input type="text" name="produto" class="form-control" value="<?php echo htmlspecialchars($produto); ?>" readonly>
                        </div>

                        <!-- Vendedor -->
                        <div class="mb-3">
                            <label for="vendedor">Vendedor:</label>
                            <input type="text" name="vendedor" class="form-control" value="<?php echo htmlspecialchars($vendedor); ?>" readonly>
                        </div>

                        <!-- Quantidade -->
                        <div class="mb-3">
                            <label for="quantidade">Quantidade:</label>
                            <input type="text" name="quantidade" class="form-control" value="<?php echo htmlspecialchars($quantidade); ?>" readonly>
                        </div>

                        <!-- Data da Venda -->
                        <div class="mb-3">
                            <label for="datavenda">Data da Venda:</label>
                            <input type="date" name="datavenda" class="form-control" value="<?php echo htmlspecialchars($datavenda); ?>" readonly>
                        </div>

                        <!-- Botões -->
                        <div class="text-center mt-4">
                            <a href="vendaselect.php" class="btn btn-voltar">Voltar</a>
                            <button type="submit" name="submit" class="btn btn-adicionar btn-danger">Excluir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer style="text-align:center; padding:15px; color:#555; font-size:14px;">
        © 2025 Sistema de Gestão Hagil Terapêutica
    </footer>
</body>
</html>

<?php
session_start();
include('verificalogin.php');
include('connect.php');

$id = $_GET['updateid'];

$sql = "SELECT v.id, p.id AS idp, p.nome AS produto, ve.id AS idv, ve.nome AS vendedor,
        p.precocusto, p.precovenda, v.quantidade, v.datavenda
        FROM venda v
        INNER JOIN produto p ON p.id = v.idproduto
        INNER JOIN vendedor ve ON ve.id = v.idvendedor
        WHERE v.id = $id";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$quantidade = $row['quantidade'];
$datavenda = $row['datavenda'];
$precocusto = $row['precocusto'];
$precovenda = $row['precovenda'];
$idproduto = $row['idp'];
$idvendedor = $row['idv'];

if (isset($_POST['submit'])) {
    $quantidade = $_POST['quantidade'];
    $datavenda = $_POST['datavenda'];
    $precocusto = str_replace(',', '.', $_POST['precocusto']);
    $precovenda = str_replace(',', '.', $_POST['precovenda']);
    $idproduto = $_POST['idproduto'];
    $idvendedor = $_POST['idvendedor'];

    $sql = "UPDATE venda 
            SET idproduto = $idproduto, 
                idvendedor = $idvendedor, 
                quantidade = $quantidade, 
                datavenda = '$datavenda', 
                precocusto = $precocusto, 
                precovenda = $precovenda 
            WHERE id = $id";

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
    <title>Atualizar Venda</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Conteúdo principal -->
    <main>
        <div class="container-form-post">
            <div class="text-center mx-auto">
                <div class="container p-3">
                    <div class="container text-center py-2">
                        <h1>Atualizar Venda</h1>
                    </div>

                    <form method="post" class="mt-3">
                        <h4>Dados da Venda</h4>

                        <!-- Produto -->
                        <div class="mb-3">
                            <label for="idproduto">Produto:</label>
                            <select name="idproduto" class="form-control">
                                <?php
                                $sqll = "SELECT * FROM produto ORDER BY nome";
                                $result = mysqli_query($con, $sqll);
                                while ($rowProd = mysqli_fetch_assoc($result)) {
                                    $selected = ($idproduto == $rowProd['id']) ? 'selected' : '';
                                    echo "<option value='{$rowProd['id']}' $selected>{$rowProd['nome']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Vendedor -->
                        <div class="mb-3">
                            <label for="idvendedor">Vendedor:</label>
                            <select name="idvendedor" class="form-control">
                                <?php
                                $sqll = "SELECT * FROM vendedor ORDER BY nome";
                                $result = mysqli_query($con, $sqll);
                                while ($rowVend = mysqli_fetch_assoc($result)) {
                                    $selected = ($idvendedor == $rowVend['id']) ? 'selected' : '';
                                    echo "<option value='{$rowVend['id']}' $selected>{$rowVend['nome']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Quantidade -->
                        <div class="mb-3">
                            <label for="quantidade">Quantidade:</label>
                            <input type="number" name="quantidade" class="form-control" value="<?php echo $quantidade; ?>" required>
                        </div>

                        <!-- Data -->
                        <div class="mb-3">
                            <label for="datavenda">Data da Venda:</label>
                            <input type="date" name="datavenda" class="form-control" value="<?php echo $datavenda; ?>" required>
                        </div>

                        <!-- Preço Custo -->
                        <div class="mb-3">
                            <label for="precocusto">Preço Custo:</label>
                            <input type="number" name="precocusto" class="form-control" step="0.01" value="<?php echo $precocusto; ?>" required>
                        </div>

                        <!-- Preço Venda -->
                        <div class="mb-3">
                            <label for="precovenda">Preço Venda:</label>
                            <input type="number" name="precovenda" class="form-control" step="0.01" value="<?php echo $precovenda; ?>" required>
                        </div>

                        <!-- Botões -->
                        <div class="text-center mt-4">
                            <a href="vendaselect.php" class="btn btn-voltar">Voltar</a>
                            <button type="submit" name="submit" class="btn btn-adicionar">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


</body>

</html>
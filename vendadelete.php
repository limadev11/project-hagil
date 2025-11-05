<?php
session_start();
include('verificalogin.php');
include('connect.php');

// Pegar ID com segurança
$id = $_GET['deleteid'] ?? 0;

// Buscar dados da venda
$stmt = $con->prepare("SELECT v.id, p.nome AS produto, ve.nome AS vendedor, 
                              v.quantidade, v.datavenda
                       FROM venda v
                       INNER JOIN produto p ON p.id = v.idproduto
                       INNER JOIN vendedor ve ON ve.id = v.idvendedor
                       WHERE v.id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("<h3>Venda não encontrada.</h3>");
}

$produto = $row['produto'];
$vendedor = $row['vendedor'];
$quantidade = $row['quantidade'];
$datavenda = $row['datavenda'];

// Deletar registro ao confirmar
if (isset($_POST['submit'])) {
    $stmt = $con->prepare("DELETE FROM venda WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header('Location: vendaselect.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Venda</title>

    <!-- CSS Bootstrap e fontes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="container-form-post py-5">
        <div class="text-center mx-auto">
            <h2 class="text-center mb-4 text-danger"><i class="bi bi-exclamation-triangle-fill"></i> Deletar Venda</h2>

            <div class="alert alert-danger text-center fw-semibold">
                Atenção! Esta ação é permanente e não poderá ser desfeita.
            </div>

            <form method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Produto:</label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($produto); ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-white">Vendedor:</label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($vendedor); ?>" readonly>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label text-white">Quantidade:</label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($quantidade); ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-white">Data da Venda:</label>
                        <input type="date" class="form-control" value="<?php echo htmlspecialchars($datavenda); ?>" readonly>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-voltar rounded-pill py-2 px-4"
                        onclick="window.location.href='vendaselect.php'">
                        <i class="bi bi-arrow-left-circle"></i> Cancelar
                    </button>
                    <button type="submit" name="submit" class="btn btn-danger rounded-pill py-2 px-4">
                        <i class="bi bi-trash"></i> Deletar Venda
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
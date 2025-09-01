<?php
$conn = new mysqli("localhost", "root", "", "gestaovendas");

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Pega o parâmetro da URL
$q = $_GET['q'] ?? "";

// Consulta preparada
$sql = "SELECT id, nome, preco, comissao, estoque, precocusto, precovenda 
        FROM produtos 
        WHERE nome LIKE ?";

$stmt = $conn->prepare($sql);

// Monta o parâmetro de busca
$busca = "%$q%";
$stmt->bind_param("s", $busca);

$stmt->execute();
$res = $stmt->get_result();

$produto = [];
while ($row = $res->fetch_assoc()) {
    $produto[] = $row;
}

// Retorna JSON com cabeçalho correto
header('Content-Type: application/json; charset=utf-8');
echo json_encode($produto, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>

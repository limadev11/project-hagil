<?php
$conn = new mysqli("localhost", "root", "", "gestaodevendas");
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (isset($_POST['query'], $_POST['column'])) {
    $search = trim($_POST['query']);
    $column = $_POST['column'];

    // Colunas válidas do banco
    $validColumns = ['vendedor', 'cliente', 'produto'];
    if(!in_array($column, $validColumns)) {
        exit;
    }

    // Monta query usando coluna validada
    $sql = "SELECT $column FROM venda WHERE $column LIKE CONCAT('%', ?, '%') LIMIT 10";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='resultado' style='padding:5px; cursor:pointer; border-bottom:1px solid #ccc'>" . htmlspecialchars($row[$column]) . "</div>";
        }
    } else {
        echo "<div class='resultado'>Nenhum resultado encontrado</div>";
    }

    $stmt->close();
}

$conn->close();
?>

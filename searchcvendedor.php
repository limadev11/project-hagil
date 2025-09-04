<?php
$conn = new mysqli("localhost", "root", "", "gestaodevendas");
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (isset($_POST['query'])) {
    $search = trim($_POST['query']);

    $stmt = $conn->prepare("SELECT nome FROM vendedor WHERE nome LIKE CONCAT('%', ?, '%') LIMIT 10");
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='resultado'>" . htmlspecialchars($row['nome']) . "</div>";
        }
    } else {
        echo "<div class='resultado'>Nenhum resultado encontrado</div>";
    }

    $stmt->close();
}

$conn->close();

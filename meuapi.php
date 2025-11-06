<?php
header('Content-Type: application/json');

// Conecta no banco e recebe o nome do cliente via método GET
include('connect.php');

// Prepara a consulta SQL para buscar os campos desejados
$sql = "select 'Venda' tipo, sum(v.valortotal) total 
from venda v inner join cliente c on c.id = v.idcliente
union all
select 'Despesa' tipo, sum(d.valor) total
from despesa d inner join tipodespesa t on t.id = d.idtipodespesa
order by 2
";
$result = mysqli_query($con, $sql);

// 
if ($result->num_rows > 0) {
    $rows = [];
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
} else {
    echo json_encode(['Erro' => 'Tem nada']);
}

// Fecha a conexão
$con->close();
?>

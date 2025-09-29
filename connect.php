<?php
  $local = $_SERVER['HTTP_HOST'];
  
  if ($local == 'localhost') {
    $con = new mysqli('localhost', 'root', '', 'gestaodevendas');
  } else {
    $con = new mysqli('108.179.192.85', 'avisnetcs_vendas', 'vendas@2024', 'avisnetc_vendas');
  }

  // Verifica se houve erro na conexão
  if ($con->connect_error) {
    die("Erro de conexão: " . $con->connect_error);
  }

  // A partir daqui, a conexão pode ser usada normalmente
?>

<?php

$lista = ['Nome', 'Email', 'Whatsapp', 'Endereço', 'Bairro', 'Cidade', 'UF', 'Operações'];
for ($lc=0; $lc < count($lista); $lc++) { 
    echo"<th scope='col'>" . $lista[$lc] . "</th>";
}

$listcolumn = ['ID', 'Vendedor', 'Cliente', 'Produto', 'Quantd.', 'Preço Custo', 'Preço Venda', 'Total', 'Data', 'Operações'];
for ($lc = 0; $lc < count($listcolumn); $lc++) {
    echo "<th scope='col' style='background-color: #404A3D; color: white; width:20px'>" . $listcolumn[$lc] . "</th>";
}
?>
<?php
require 'db.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=estoque.csv');

$output = fopen('php://output', 'w');

// Adiciona o cabeçalho da tabela
fputcsv($output, ['ID', 'Tipo Sanguíneo', 'Quantidade de Bolsas', 'Localização']);

$sql = "SELECT * FROM estoque";
$result = $mysqli->query($sql);

// Adiciona os dados da tabela ao arquivo CSV
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
$mysqli->close();
?>

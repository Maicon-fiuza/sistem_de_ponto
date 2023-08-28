<?php

$dbHost = 'localhost';  
$dbUsername = 'root';
$dbPassword = '';  
$dbName = 'formulario-maicon';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
//if ($conexao->connect_errno) {
// echo "Erro: " . $conexao->connect_error;  // Apenas para averiguar.
//} else {
//    echo 'Conexão efetuada com sucesso.';
//}

?>

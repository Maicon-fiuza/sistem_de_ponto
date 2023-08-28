<?php
session_start();
include_once('config.php');

if ((!isset($_SESSION['email'])) && (!isset($_SESSION['number']))) {
    header('Location: tela-login.php');
    exit();
}
$logado = $_SESSION['email'];
$sql = "SELECT * FROM usuarios ORDER BY idusuarios DESC";

$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sistema.css">
    <title>SISTEMA MF</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(./rota66.jpng.jpg);
        }
        .navbar {
            background-color: #007BFF;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .btn-danger {
            margin-right: 20px;
        }

        .container {
            padding: 20px;
        }

        h1 {
            color: white;
        }

        .table {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }

        .table th,
        .table td {
            border: 1px solid #ffffff;
            padding: 10px;
        }

        .table th {
            background-color: #343a40;
        }

        .table th,
        .table td {
            padding: 10px;
        }

        .table th,
        .table td {
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MF TRANSPORTES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <?php
    echo "<h1>MF transporte! <u>$logado</u></h1>";
    ?>
    <h1>BEM VINDO!</h1>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Email</th>
                    <th scope="col">matricula</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data atual</th>
                    <th scope="col">Hora de chegada</th>
                    <th scope="col">Hora de intervalo</th>
                    <th scope="col">Volta do intervalo</th>
                    <th scope="col">Saida</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $user_data['idusuarios'] . "</td>";
                    echo "<td>" . $user_data['nome'] . "</td>";
                    echo "<td>" . $user_data['senha'] . "</td>";
                    echo "<td>" . $user_data['email'] . "</td>";
                    echo "<td>" . $user_data['matricula'] . "</td>";
                    echo "<td>" . $user_data['sexo'] . "</td>";
                    echo "<td>" . $user_data['data_atual'] . "</td>";
                    echo "<td>" . $user_data['hora_chegada'] . "</td>";
                    echo "<td>" . $user_data['hora_intervalo'] . "</td>";
                    echo "<td>" . $user_data['volta_intervalo'] . "</td>";
                    echo "<td>" . $user_data['hora_saida'] . "</td>";
                    echo "<td>" . $user_data['horas_trabalhadas'] . "</td>";
                    echo "<td>
                        <a class='btn btn-sm btn-primary' href='edit.php?id=" . $user_data['idusuarios'] . "' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                        </a> 
                        <a class='btn btn-sm btn-danger' href='delete.php?id=" . $user_data['idusuarios'] . "' title='Deletar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>
                        </a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            searchData();
        }
    });

    function searchData() {
        window.location = 'sistema.php?search=' + search.value;
    }
</script>
</html>

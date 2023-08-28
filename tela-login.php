<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(./rota66.jpng.jpg);
        }

        .registro-funcionario {
            background-color: rgba(0, 0, 0, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: whitesmoke;
        }

        input {
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }

        .inputSubmit {
            background-color: burlywood;
            padding: 15px;
            width: 50%;
            border-radius: 10px;
            color: rgb(2, 2, 2);
            font-size: 15px;
        }

        .inputSubmit:hover {
            background-color: maroon;
            cursor: pointer;
        }
    </style>
    <title>Registro de Funcionario</title>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="registro-funcionario">
        <h1>M.F TRANSPORTES</h1>
        <h2>Registro de funcionario</h2>
        <form action="testeLogin.php" method="POST">
            <input type="text" name="email" placeholder="email">
            <br>
            <br>
            <input type="text" name="number" placeholder="matricula">
            <br>
            <br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>
</html>

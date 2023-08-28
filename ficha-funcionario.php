<?php
if(isset($_POST['submit'])){
    include_once('config.php');

    // Capturar os dados do formulário
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $matricula = mysqli_real_escape_string($conexao, $_POST['number']);
    $sexo = mysqli_real_escape_string($conexao, $_POST['genero']);
    $data_atual = mysqli_real_escape_string($conexao, $_POST['data_atual']);
    $horario_chegada = new DateTime($_POST['horario_chegada']);
    $horario_intervalo = new DateTime($_POST['horario_intervalo']);
    $horario_volta = new DateTime($_POST['volta_intervalo']);
    $horario_saida = new DateTime($_POST['horario_saida']);

    // Calcula a diferença entre os horários para obter as horas trabalhadas
    $intervalo_chegada_intervalo = $horario_chegada->diff($horario_intervalo);
    $intervalo_volta_saida = $horario_volta->diff($horario_saida);

    // Obtém as horas trabalhadas em minutos
    $minutos_trabalhados = $intervalo_chegada_intervalo->format('%i') + $intervalo_volta_saida->format('%i');
    $horas_trabalhadas = floor($minutos_trabalhados / 60); // Horas inteiras
    $minutos_trabalhados %= 60; // Minutos restantes

    // Formata as horas e minutos para exibição
    $horas_trabalhadas_formatadas = sprintf('%02d:%02d', $horas_trabalhadas, $minutos_trabalhados);

    // Inserir os dados no banco de dados
    $query = "INSERT INTO usuarios(nome,email,matricula,sexo,data_atual,hora_chegada,hora_intervalo,hora_saida,horas_trabalhadas) 
              VALUES('$nome','$email','$matricula','$sexo','$data_atual','".$horario_chegada->format('H:i')."','".$horario_intervalo->format('H:i')."','".$horario_volta->format('H:i')."','$horas_trabalhadas_formatadas')";

    if(mysqli_query($conexao, $query)){
        echo "Registro inserido com sucesso.";
    } else {
        echo "Erro ao inserir registro: " . mysqli_error($conexao);
    }
}
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ficha-funciario.css">
    <title>Ficha | M.F TRANSPORTES</title>
</head>
<body>
    <a href="home.php">Voltar</a> 
    <div class="box">
        <form action="ficha-funcionario.php" method="POST">
            <fieldset>
                <legend><b>Ficha para cadastro de ponto</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br>
                <br>
                <div class="inputBox">
                    <input type="number" name="number" id="number" class="inputUser" required>
                    <label for="matricula" class="labelInput">Matricula</label>
                </div>
                <br>
              
                <p>Sexo:</p>
                <label for="feminino">Feminino</label>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                
                <label for="masculino">Masculino</label>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
               
                <label for="outros">Outros</label>
                <input type="radio" id="outros" name="genero" value="outros" required>
               
                <br>
                <br>
                <label for="data_atual"><b>Data Atual</b></label>
                <input type="date" name="data_atual" id="data_atual" required> 
                <br>

                <div class="inputBox">
                    <input type="time" name="horario_chegada" id="horario_chegada" class="inputUser" required>
                    <label for="horario_chegada">Chegada</label>
                </div>
                <br>

                <div class="inputBox">
                    <input type="time" name="horario_intervalo" id="horario_intervalo" class="inputUser" required>
                    <label for="horario_intervalo">Intervalo</label>
                </div>
                <br>
                <div class="inputBox">
                    <label for="volta_intervalo">Volta</label>
                    <input type="time" name="volta_intervalo" id="volta_intervalo" class="inputUser" required>
                </div>
                <br>
                <div class="inputBox">
                    <input type="time" name="horario_saida" id="horario_saida" class="inputUser" required>
                    <label for="horario_saida">Saída</label>
                </div>
                <br>
                
                <br>
                <br>
                <input type="submit" name="submit" id="submit">
                
            </fieldset>
      
        </form>
    </div>
</body>
</html>

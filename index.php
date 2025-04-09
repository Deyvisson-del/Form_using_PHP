<?php
// Processamento do formulário
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "bd_cadastro";

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    echo "Conexão realizada com sucesso!<br>";

    // Verificando se os campos foram enviados
    $name = $_GET['name'] ?? '';
    $email = $_GET['email'] ?? '';
    $cpf = $_GET['cpf'] ?? '';

    echo "<br>Dados recebidos:<br>";
    echo "<br>Nome: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "CPF: " . $cpf . "<br>";

    $sql = "INSERT INTO usuarios (nome, email, cpf) VALUES ('$name', '$email', '$cpf')";
    if ($conexao->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conexao->error;
    }

    $conexao->close();
?>
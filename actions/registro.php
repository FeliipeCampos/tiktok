<?php
include('../conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["nome_registro"]) && !empty($_POST["apelido_registro"]) && !empty($_POST["email_registro"]) && !empty($_POST["senha_registro"])) {
        $nome = $_POST["nome_registro"];
        $apelido = $_POST["apelido_registro"];
        $email = $_POST["email_registro"];
        $senha = password_hash($_POST["senha_registro"], PASSWORD_BCRYPT); 

        $sql = "INSERT INTO usuarios (nome, apelido, email, senha) VALUES ('$nome', '$apelido', '$email', '$senha')";

        if ($conn->query($sql) === TRUE) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . $conn->error;
        }
    } else {
        echo "Por favor, preencha todos os campos obrigatórios.";
    }
}

$conn->close();
?>

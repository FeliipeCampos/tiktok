<?php
   include('../conexao.php');
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (isset($_POST["email"]) && isset($_POST["senha"])) {
           $email = $_POST["email"];
           $senha = $_POST["senha"];
   
           $sql = "SELECT * FROM usuarios WHERE email = '$email'";
           $result = $conn->query($sql);
   
           if ($result->num_rows == 1) {
               $row = $result->fetch_assoc();
   
               if (password_verify($senha, $row["senha"])) {
                   session_start();
                   $_SESSION['usuario_id'] = $row['id'];
                   $_SESSION['usuario_nome'] = $row['nome'];
   
                   $usuario_id = $row['id'];
   
                   header("Location: ../index.php");
                   exit();
               } else {
                   echo "Senha incorreta.";
               }
           } else {
               echo "Email não encontrado.";
           }
       } else {
           echo "Por favor, preencha todos os campos.";
       }
   }
   
   $conn->close();
   ?>
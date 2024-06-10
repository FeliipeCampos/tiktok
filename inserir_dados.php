<?php
   include('conexao.php');
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (isset($_POST["titulo"]) && isset($_POST["som"]) && isset($_FILES["video"]["name"]) && isset($_POST["usuario_id"])) {
           $titulo = $_POST["titulo"];
           $som = $_POST["som"];
           $usuario_id = $_POST["usuario_id"];
   
           $video_dir = "videos/";
           $video_extensao = pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION);
           $video_nome = uniqid() . '.' . $video_extensao; 
           $video_temp = $_FILES["video"]["tmp_name"];
           $video_destino = $video_dir . $video_nome;
   
           if (move_uploaded_file($video_temp, $video_destino)) {
               $sql = "INSERT INTO videos (titulo, som, video, id_usuario) VALUES ('$titulo', '$som', '$video_destino', '$usuario_id')";
   
               if ($conn->query($sql) === TRUE) {
                   echo "Dados inseridos com sucesso!";
               } else {
                   echo "Erro ao inserir dados: " . $conn->error;
               }
           } else {
               echo "Erro ao fazer o upload do vídeo.";
           }
       } else {
           echo "Alguns campos do formulário não foram preenchidos.";
       }
   }
   
   $conn->close();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>TikTok Layout</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   </head>
   <body>
      <?php 
         include('header.php');
         ?>
      <?php
         include('conexao.php');
         
         $sql = "SELECT v.titulo, v.som, v.video, u.nome, u.apelido
         FROM videos v
         JOIN usuarios u ON v.id_usuario = u.id
         ORDER BY u.id DESC;";
         
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
         
                 $nome = $row["nome"];
                 $apelido = $row["apelido"];
                 $titulo = $row["titulo"];
                 $som = $row["som"];
                 $video_url = $row["video"];
         
                 $titulo = preg_replace('/#(\w+)/', '<a href="tag/$1">#$1</a>', $titulo);
         
                 ?>
      <div class="container my-2 d-flex justify-content-center align-items-center">
         <div class="row">
            <div class="col-12">
               <span class="d-block mb-1" style="font-size: 1.3rem;"><strong><?php echo $nome; ?></strong> <span
                  style="font-size: 1.0rem;"><?php echo $apelido; ?></span></span>
               <span class="d-block"><?php echo $titulo; ?></span>
               <span class="d-block mb-2" style="font-size: 0.8em;"><i class="fas fa-music"
                  style="font-size: 0.7em;"></i> Som original -
               <?php echo $som; ?></span>
               <div class="d-flex align-items-center">
                  <div class="embed-responsive" style="width: 360px; height: 640px;">
                     <video autoplay muted controls>
                        <source src="<?php echo $video_url; ?>" type="video/mp4">
                     </video>
                  </div>
                  <div class="d-flex ml-3 flex-column mt-auto align-items-center">
                     <button class="btn rounded-circle d-flex justify-content-center align-items-center p-2 mb-2"
                        style="background-color: #f1f1f2;">
                     <i class="fas fa-heart fa-2x text-black"></i>
                     </button>
                     <span id="likeCounter">00</span>
                     <button class="btn rounded-circle d-flex justify-content-center align-items-center p-2 mb-2"
                        style="background-color: #f1f1f2;">
                     <i class="fas fa-comment-dots fa-2x text-black"></i>
                     </button>
                     <span id="commentCounter">00</span>
                     <button class="btn rounded-circle d-flex justify-content-center align-items-center p-2 mb-2"
                        style="background-color: #f1f1f2;">
                     <i class="fas fa-bookmark fa-2x text-black"></i>
                     </button>
                     <span id="bookmarkCounter">00</span>
                     <button class="btn rounded-circle d-flex justify-content-center align-items-center p-2 mb-2"
                        style="background-color: #f1f1f2;">
                     <i class="fas fa-share fa-2x text-black"></i>
                     </button>
                     <span id="shareCounter">00</span>
                  </div>
               </div>
               <hr>
            </div>
         </div>
      </div>
      <?php
         }
         } else {
         echo "Nenhum registro encontrado.";
         }
         
         $conn->close();
         ?>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
   </body>
</html>
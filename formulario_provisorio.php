<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>TikTok Layout</title>

   </head>
   <?php include('header.php');?>
   <body>
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-6">
               <h1 class="mt-5 mb-4">Formulário TikTok</h1>
               <form action="inserir_dados.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label for="titulo">Título do Vídeo:</label>
                     <input type="text" class="form-control" name="titulo" id="titulo" required> <br><br>
                  </div>
                  <div class="form-group">
                     <label for="som">Som Original:</label>
                     <input type="text" class="form-control" name="som" id="som" required> <br><br>
                  </div>
                  <div class="form-group">
                     <label for="video">Vídeo:</label>
                     <input type="file" class="form-control-file" name="video" id="video" accept=".mp4" required> <br><br>
                  </div>
                  <input type="hidden" name="usuario_id" value="<?php echo $usuario_id ?>">
                  <button type="submit" class="btn btn-block btn-secondary">Enviar</button>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>
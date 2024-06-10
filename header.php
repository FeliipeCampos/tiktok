<?php
   session_start();
   
   $usuario_id = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : null;
   
   ?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
   <div class="container">
      <a class="navbar-brand" href="index.php">
      <img src="images/logo.png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <?php
                  if (isset($_SESSION['usuario_nome'])) {
                      echo '<a class="btn btn-outline-dark mr-2" href="formulario_provisorio.php"><i class="fas fa-plus"></i> Carregar</a>';
                  } else {
                      echo '<button class="btn btn-outline-dark mr-2" data-toggle="modal" data-target="#modal-entrar"><i class="fas fa-plus"></i> Carregar</button>';
                  }
                  ?>
            </li>
            <li class="nav-item">
               <?php
                  if (isset($_SESSION['usuario_nome'])) {
                      $usuarioNome = $_SESSION['usuario_nome'];
                  ?>
               <div class="btn-group">
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?= $usuarioNome ?>
                  </button>
                  <div class="dropdown-menu">
                     <a class="dropdown-item" href="actions/logout.php">Sair</a>
                  </div>
               </div>
               <?php
                  } else {
                  ?>
               <button class="btn btn-danger" data-toggle="modal" data-target="#modal-entrar">Entrar</button>
               <?php
                  }
                  ?>
            </li>
         </ul>
      </div>
   </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="modal-entrar" tabindex="-1" role="dialog" aria-labelledby="modal-entrarTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header border-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="text-center mb-3">
               <h5 class="modal-title"><strong>Entrar no TikTok</strong></h5>
            </div>
            <form id="login-form" action="actions/login.php" method="POST">
               <div class="form-group">
                  <label for="email"><strong>E-mail ou nome de usuário</strong></label>
                  <input type="email" class="form-control form-control-lg mb-3 bg-light" id="email" name="email" placeholder="E-mail">
                  <input type="password" class="form-control form-control-lg bg-light" id="senha" name="senha" placeholder="Senha">
                  <small>Esqueceu a senha?</small>
               </div>
               <button type="submit" class="btn btn-light btn-lg btn-block" id="login">Entrar</button>
            </form>
            <form id="signup-form" action="actions/registro.php" method="POST" style="display: none;">
               <div class="form-group">
                  <input type="text" class="form-control form-control-lg mb-3 bg-light" id="nome_registro" name="nome_registro" placeholder="Nome">
               </div>
               <div class="form-group">
                  <input type="text" class="form-control form-control-lg mb-3 bg-light" id="apelido_registro" name="apelido_registro" placeholder="Apelido">
               </div>
               <div class="form-group">
                  <input type="text" class="form-control form-control-lg mb-3 bg-light" id="email_registro" name="email_registro" placeholder="Email">
               </div>
               <div class="form-group">
                  <input type="password" class="form-control form-control-lg bg-light" id="senha_registro" name="senha_registro" placeholder="Senha">
               </div>
               <button type="submit" class="btn btn-light btn-lg btn-block" id="registrar">Registrar</button>
            </form>
            <br><br><br><br><br><br><br><br><br>
            <hr>
            <div class="text-center">
               <p id="toggle-text">Já tem uma conta? <a href="#" class="text-danger" id="criar_conta">Criar conta</a></p>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   function toggleForms() {
       var loginForm = document.getElementById('login-form');
       var signupForm = document.getElementById('signup-form');
       var modalTitle = document.querySelector('.modal-title');
       var toggleText = document.getElementById('toggle-text');
   
       if (signupForm.style.display === 'none') {
           signupForm.style.display = 'block';
           loginForm.style.display = 'none';
           modalTitle.innerHTML = '<strong>Criar Conta no TikTok</strong>';
           toggleText.innerHTML = 'Já tem uma conta? <a href="#" class="text-danger" id="entrar_conta">Entrar</a>';
           
           document.getElementById('entrar_conta').addEventListener('click', toggleForms);
       } else {
           loginForm.style.display = 'block';
           signupForm.style.display = 'none';
           modalTitle.innerHTML = '<strong>Entrar no TikTok</strong>';
           toggleText.innerHTML = 'Não tem uma conta? <a href="#" class="text-danger" id="criar_conta">Criar conta</a>';
           
           document.getElementById('criar_conta').addEventListener('click', toggleForms);
       }
   }
   
   document.getElementById('criar_conta').addEventListener('click', toggleForms);
   
   document.getElementById('entrar_conta').addEventListener('click', toggleForms);
</script>
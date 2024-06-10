<?php
   session_start(); 
   
   if (isset($_SESSION['usuario_nome'])) {
       session_destroy();
       unset($_SESSION['usuario_nome']);
   
       header("Location: ../index.php");
   } else {
       header("Location: ../index.php");
   }
   
   ?>
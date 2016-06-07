<?php
   session_start();
   unset($_SESSION['user']);
   unset($_SESSION['pass']);
   session_destroy();
   header('Refresh: 0; URL = ../html/login.html');
?>
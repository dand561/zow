<?php
   session_start();
   unset($_SESSION['user']);
   unset($_SESSION['pass']);
   unset($_SESSION['loggedin']);
   
   header('Refresh: 0; URL = ../html/login.html');
   
?>
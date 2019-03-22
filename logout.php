<?php
session_start();
if(isset($_SESSION['id']))
{
  unset($_SESSION['id']);
  session_destroy();
  echo"<script> window.location.href = 'page-login.html' ; </script>";
}
?>

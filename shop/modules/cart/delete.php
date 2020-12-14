<?php 
  if(!isset($_SESSION)){
    session_start();
  }
  
  if(isset($_GET['id'])){
    unset($_SESSION['cart'][$_GET['id']]);
    header("Location:../../index.php?m=cart");
   }
?>
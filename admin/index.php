<?php 
session_start();
include "../library/connect.php";
include "model/brand.php";
include "model/categories.php";
include "model/product.php";
include "model/order.php";

if(!isset($_SESSION['userName']) || $_SESSION['level'] != 1){
  header("Location:login.php");
  exit();
}


if(isset($_GET['p']) && $_GET['p'] == "signout"){
  session_destroy();
  header("Location:index.php");
}

$modules = array("brand", "categories", "product", "order");
$pages = array("list", "create", "delete", "edit", "detail");
?>

<!DOCTYPE html>
<html lang="vn">
<head>
  <?php include "block/head.php" ?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <!-- SEARCH FORM -->
      <?php include "block/left_navbar.php" ?>
      <!-- Right navbar links -->
      <?php include "block/right_navbar.php" ?>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <div class="sidebar">
        <?php include "block/sidebar_user.php" ?>
        <?php include "block/sidebar_menu.php" ?>
      </div>
    </aside>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php include "block/content_header.php" ?>
      <!-- Main content -->
      <div class="content">
        <?php
          if(isset($_GET["m"]) && isset($_GET["p"]))
          {
            $m = $_GET["m"];
            $p = $_GET["p"];
            foreach($modules as $module){
              if($module == $m){
                foreach($pages as $page){
                  if($page == $p){
                    include "modules/".$m."/".$p.".php";
                  }
                }
              }
            }
          }else{
            include "block/main_content.php";
          }
        ?>
      </div>
    </div>

    <!-- Main Footer -->
    <?php include "block/footer.php" ?>
  </div>
  <!-- ./wrapper -->
  <!-- SCRIPTS -->
  <?php include "block/foot.php" ?>
  
</body>
</html>
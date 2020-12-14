<?php 
  session_start();
  //session_destroy();
  include "../library/connect.php";
  include "functions/f_product.php";
  if(isset($_GET['p']) && $_GET['p'] == "logout"){
    session_destroy();
    header("Location:index.php");
  }
?>

<!DOCTYPE html>
<html lang="vn">

  <head>
    <?php include "block/head.php"?>
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   -->
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <?php include "block/navbar.php" ?>

    <!-- Page Content -->
    <?php 
      if(isset($_GET['m'])){
        $m = $_GET['m'];
        switch($m){
          case "home":
            include "modules/home/main.php";
          break;
          case "products":
            include "modules/products/main.php";
          break;
          case "cart":
            include "modules/cart/main.php";
          break;
          case "order":
            include "modules/order/main.php";
          break;
           case "search":
            include "modules/search/search.php";
          break;
          default:
            include "modules/home/main.php";
        }
      }
      else{
        include "modules/home/main.php";
      }
    ?>
    <!-- Page Content End -->
    
    <!--Footer-->
    <?php include "block/footer.php" ?>

    <!--file script-->
    <?php include "block/foot.php" ?>
  </body>

</html>

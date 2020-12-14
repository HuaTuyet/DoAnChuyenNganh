<?php 
  // $perPage = 6;
  // if(isset($_GET['type'])){
  //   $totalRow = getTotalRowType($obj)
  // }
?>

<!--Banner-->
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>new arrivals</h4>
          <h2>sixteen products</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Banner-->
<!--Thanh tim kiem-->
<?php include "modules/search/search.php" ?>

<div class="products">
  <div class="container">
    <?php 
      if(isset($_GET['p']) && $_GET['p'] == "detail") {
        include "content/detail.php";
      } else {
        include "content/summary.php";
      }
    ?>  
  </div>
</div>
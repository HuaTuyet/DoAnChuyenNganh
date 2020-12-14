
<?php
      $perPage = 6; 
      if(isset($_GET['page'])){
          $page = $_GET['page'];
      }
      else{
        $page = 1;
      }

      //Hiển thị sản phẩm theo loại
      if(isset($_GET['type'])){
        $type = $_GET['type'];
        $totalRow = getTotalRowType($obj, $type);
        $totalPage = ceil($totalRow / $perPage);
        
        $start = ($page - 1 ) * $perPage;
        $list = getProductByType($obj, $type, $perPage, $start);
        foreach($list as $item) {
        ?>
<div class="col-md-4 ">
  <div class="product-item">
    <img src="../public/images/products/<?php echo $item['prodImage'] ?>" alt="">
    <a href="index.php?m=cart&&action=add&&id=<?php echo $item['prodId']?>" title="Thêm vào giỏ hàng" class="cart">
      <i class="fa fa-cart-plus" aria-hidden="true"></i>
    </a>
    <div class="down-content">
      <a href="index.php?m=products&p=detail&id=<?php echo $item['prodId'] ?>">
        <h4><?php echo $item['prodName'] ?></h4>
      </a>
      <h6><?php echo number_format($item['price']) ?> VNĐ</h6>
    </div>
  </div>
</div>
<?php } }

    //Hiển thị sản phẩm theo thương hiệu
     else if(isset($_GET['brand'])){
        $brand = $_GET['brand'];
        $totalRow = getTotalRowbrand($obj, $brand);
        $totalPage = ceil($totalRow / $perPage);
        
        $start = ($page - 1 ) * $perPage;
        $list = getProductByBrand($obj, $brand, $perPage, $start);
        foreach($list as $item) {
        ?>
<div class="col-md-4 ">
  <div class="product-item">
    <img src="../public/images/products/<?php echo $item['prodImage'] ?>" alt="">
    <a href="index.php?m=cart&&action=add&&id=<?php echo $item['prodId'] ?>" title="Thêm vào giỏ hàng" class="cart">
      <i class="fa fa-cart-plus" aria-hidden="true"></i>
    </a>
    <div class="down-content">
      <a href="index.php?m=products&p=detail&id=<?php echo $item['prodId'] ?>">
        <h4><?php echo $item['prodName'] ?></h4>
      </a>
      <h6><?php echo number_format($item['price']) ?> VNĐ</h6>
    </div>
  </div>
</div>
<?php } } 

      //Hiển thị tất cả sản phẩm
        else {      
          $totalRow = getTotalRow($obj);
          $totalPage = ceil($totalRow / $perPage);

          $start = ($page - 1 ) * $perPage;
          $list = getProductList($obj, $perPage, $start);
          foreach($list as $item){
      ?>
<div class="col-md-4">
  <!--all des-->
  <div class="product-item">
    <img src="../public/images/products/<?php echo $item['prodImage'] ?>" alt="">
    <a href="index.php?m=cart&&action=add&&id=<?php echo $item['prodId'] ?>" title="Thêm vào giỏ hàng" class="cart">
      <i class="fa fa-cart-plus" aria-hidden="true"></i>
    </a>
    <div class="down-content">
      <a href="index.php?m=products&p=detail&id=<?php echo $item['prodId'] ?>">
        <h4><?php echo $item['prodName'] ?></h4>
      </a>
      <h6><?php echo number_format($item['price']) ?> VNĐ</h6>
    </div>
  </div>
</div>
<?php } } ?>

<!-- </div>
  </div>
</div> -->
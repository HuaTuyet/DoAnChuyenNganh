<?php 
  $perPage = 4;
  $glasses = getProductByType($obj, "gk", $perPage);
  $sunGlasses = getProductByType($obj, "km", $perPage);
  $lenses = getProductByType($obj, "tk", $perPage);
  function checkSignin(){
  if(!isset($_SESSION['signin']['username'])){
    //header("Location:index.php");
    echo "<script>alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng')</script>";
}}
?>

<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Gọng kính</h2>
          <a href="products.html">xem tất cả <i class="fa fa-angle-right"></i></a>
        </div>
      </div>

      <?php 
        foreach($glasses as $glass){
      ?>

      <div class="col-md-3">
        <div class="product-item">
          <a href="">
            <img src="../public/images/products/<?php echo $glass['prodImage'] ?>" alt="" height="100%">
          </a>
          <a href="index.php?m=cart&&action=add&&id=<?php echo $glass['prodId'] ?>" 
             title="Thêm vào giỏ hàng" 
             class="cart"
          >
            <i class="fa fa-cart-plus" aria-hidden="true"></i>
          </a>
          <div class="down-content">
            <a href="index.php?m=products&p=detail&id=<?php echo $glass['prodId'] ?>">
              <h4><?php echo $glass['prodName'] ?></h4>
            </a>
            <h6><?php echo number_format($glass['price']) ?> VNĐ</h6>
          </div>
        </div>
      </div>
        <?php } ?>     
    </div>

    <!-- KÍNH MÁT -->
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Kính mát</h2>
          <a href="products.html">xem tất cả <i class="fa fa-angle-right"></i></a>
        </div>
      </div>

      <?php 
        foreach($sunGlasses as $sunGlass){
      ?>

      <div class="col-md-3">
        <div class="product-item">
          <a href=""><img src="../public/images/products/<?php echo $sunGlass['prodImage'] ?>" alt=""></a>
          <a href="index.php?m=cart&&action=add&&id=<?php echo $sunGlass['prodId'] ?>" title="Thêm vào giỏ hàng" class="cart">
            <i class="fa fa-cart-plus" aria-hidden="true"></i>
          </a>
          <div class="down-content">
            <a href="index.php?m=products&p=detail&id=<?php echo $sunGlass['prodId'] ?>">
              <h4><?php echo $sunGlass['prodName'] ?></h4>
            </a>
            <h6><?php echo number_format($sunGlass['price']) ?> VNĐ</h6>
          </div>
        </div>
      </div>
        <?php } ?>     
    </div>

    <!--TRÒNG KÍNH-->
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Tròng kính</h2>
          <a href="products.html">xem tất cả <i class="fa fa-angle-right"></i></a>
        </div>
      </div>

      <?php 
        foreach($lenses as $lens){
      ?>

      <div class="col-md-3">
        <div class="product-item">
          <a href=""><img src="../public/images/products/<?php echo $lens['prodImage'] ?>" alt=""></a>
          <a href="index.php?m=cart&&action=add&&id=<?php echo $lens['prodId'] ?>" title="Thêm vào giỏ hàng" class="cart">
            <i class="fa fa-cart-plus" aria-hidden="true"></i>
          </a>
          <div class="down-content">
            <a href="index.php?m=products&p=detail&id=<?php echo $lens['prodId'] ?>">
              <h4><?php echo $lens['prodName'] ?></h4>
            </a>
            <h6><?php echo number_format($lens['price']) ?> VNĐ</h6>
          </div>
        </div>
      </div>
        <?php } ?>     
    </div>
  </div>
</div>
<?php 
  if(!isset($_SESSION)){
    session_start();
  }
  $count = 0;
  if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $v){
      $count += $v['quantity'];
  }}
?>

<header class="">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <h2>Glasses <em>Shop</em></h2>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item">
            <a class="nav-link" href="products.html">
              <i class="fa fa-search" aria-hidden="true"></i>
            </a>
          </li> -->
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Trang chủ
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?m=products" id="dropdownMenu" >Sản phẩm</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
              <a href="index.php?m=products&type=gk" class="dropdown-item">Gọng kính</a>
              <a href="index.php?m=products&type=tk" class="dropdown-item">Tròng kính</a>
              <a href="index.php?m=products&type=km" class="dropdown-item">Kính mát</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Giới thiệu</a>
          </li>

          <?php if(isset($_SESSION['signin']['userName'])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="" id="dropdownMenu" >Tài khoản</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="index.php?p=logout" id="dropdownMenu" >Đăng xuất</a>
          </li>
          <?php } else {?>
            <li class="nav-item">
            <a class="nav-link" href="signin.php" id="dropdownMenu" >Đăng nhập</a>
          </li>
          <?php } ?>

          <li class="nav-item">
            <a class="nav-link" href="index.php?m=cart">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <span class="badge badge-danger"><?php echo $count ?></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<!-- Menu thương hiệu
  <li class="nav-item">
            <a class="nav-link" href="products.html" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Thương hiệu</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
              <a href="#" class="dropdown-item">Taho</a>
              <a href="#" class="dropdown-item">Chanel</a>
              <a href="#" class="dropdown-item">Gucci</a>
            </div>
          </li>
-->
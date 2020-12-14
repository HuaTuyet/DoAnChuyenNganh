<?php 
  if(isset($_POST['btnSearch'])){
    $result = findProduct($obj, $_POST['search']);
    //var_dump($result1);
  }
?>

<!-- <div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>Tìm kiếm sản phẩm</h4>
        </div>
      </div>
    </div>
  </div>
</div> -->

<div class="search">
  <form action="index.php?m=search" method="post">
    <input type="text" placeholder="Nhập từ khóa" name="search">
    <button type="submit" name="btnSearch">
      <i class="fa fa-search" aria-hidden="true"></i>
    </button>
  </form>
</div>

<div class="page-heading-search">
<div class="products">
  <div class="container">
    <div class="row">
      <?php if(isset($result)){
        if (count($result) != 0){
          foreach($result as $item){
        ?>
      <div class="col-md-4 ">
        <div class="product-item">
          <img src="../public/images/products/<?php echo $item['prodImage'] ?>" alt="">
          <a href="index.php?m=cart&&action=add&&id=<?php echo $item['prodId']?>" title="Thêm vào giỏ hàng"
            class="cart">
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
      <?php } } else {?>
        <div class="col-md-12">
          <p style="text-align: center; font-size: 20px">Sản phẩm này không có.</p>
        </div>
      <?php } }?>
    </div>
  </div>
</div>
      </div>
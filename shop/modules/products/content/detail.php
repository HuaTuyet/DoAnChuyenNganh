<?php 
  $product = getProductById($obj, $_GET['id']);
?>

<div class="row">
  <div class="col-md-4">
    <img src="../public/images/products/<?php echo $product['prodImage']; ?>" alt="Hình" width="100%">
  </div>
  <div class="col-md-6">
    <h5><?php echo $product['prodName']; ?></h5>
    <p>
      Thương hiệu: <?php echo $product['brandName']; ?><br>
    </p><br>
    <h5><?php echo number_format($product['price']); ?> VNĐ</h5><br>
    <div class="row">
      <div class="col-md-3">
        <a href="index.php?m=cart&&action=add&&id=<?php echo $product['prodId']?>" class="btn btn-danger">Thêm vào giỏ</a>
      </div>
      <div class="col-md-3">
         <a href="index.php?m=cart&&id=<?php echo $product['prodId']?>" class="btn btn-danger">Mua ngay</a>
      </div>
    </div><br>
    <p><?php echo $product['prodDes']; ?></p>
  </div>
</div>
</div>
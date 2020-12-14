<?php 
  if(!isset($_SESSION)){
    session_start();
  }
  
  if(isset($_POST['updateCart'])){
    foreach($_POST['id'] as $key=>$id){
      $_SESSION['cart'][$id]['quantity'] = $_POST['quantity'][$key];
    }
    header("Location:index.php?m=cart");
  }

  if(!isset($_SESSION['signin']['userName'])){
    header("Location:signin.php");
  } else {
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(!isset($_SESSION['cart'][$id])){
      $data = getProductById($obj, $id);
      $item = [
      "id"=>$data['prodId'],
      "name"=>$data['prodName'],
      "image"=>$data['prodImage'],
      "price"=>$data['price'],
      "quantity"=>1,
      ];
      $_SESSION['cart'][$id] = $item;
    }
    else{
      $_SESSION['cart'][$id]['quantity'] += 1;
    }
  }

  if(isset($_GET['action'])){
    if($_GET['action'] == "add"){
      header("Location:index.php?m=products");
    }
  }}

  $totalBill = 0;

  
?>

<!--Banner-->
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>Giỏ hàng của bạn</h4>
          <!-- <h2>sixteen products</h2> -->
        </div>
      </div>
    </div>
  </div>
</div>
<!--Banner-->

<div class="products">
  <div class="container">
<?php if(isset($_GET['s']) && $_GET['s'] == "buyed"){ 
  foreach($_SESSION['cart'] as $k=>$v){
    unset($_SESSION['cart'][$k]);
  };
?>
<h4>Bạn đã đặt hàng thành công</h4>
<a href="index.php">Quay lại trang chủ</a>
<?php } else{ ?>

  <form action="index.php?m=cart" method="post">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover">
          <thead>
            <tr>
              <th colspan="2">Sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th colspan="2">Tạm tính</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($_SESSION['cart'] as $key=>$product){
              $totalTemp = $product['quantity'] * $product['price'];
             ?>
            <tr>
              <td colspan="2">
                <img src="../public/images/products/<?php echo $product['image']?>" width=50px>
                <?php echo $product['name'] ?>
              </td>

              <td style="vertical-align: middle"><?php echo number_format($product['price']) ?></td>
              <td style="vertical-align: middle">
                <input name="quantity[]" type="number" min="1" value="<?php echo $product['quantity']?>" style="width: 20%"> 
                <input name="id[]" type="hidden" value="<?php echo $product['id'] ?>">
              </td>
              <td style="vertical-align: middle"><?php echo number_format($totalTemp) ?></td>
              <td style="vertical-align: middle">
                <a href="modules/cart/delete.php?id=<?php echo $key?>"> <!--XÓA GIỎ HÀNG-->
                  <i class="fa fa-trash" aria-hidden="true"></a></i>
              </td>
            </tr>
            <?php 
            $totalBill += $totalTemp;
            }                
            ?>
            <tr>
              <td colspan="3"><strong>Tổng tiền</strong><td>
              <td><?php echo number_format($totalBill)?></td>
              <td colspan="2"></td>
            <tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3"><a href="index.php?m=products"><i class="fa fa-arrow-left" aria-hidden="true"></i> Tiếp tục mua hàng</a></div>
      <div class="col-md-6"></div>
      <div class="col-md-2 text-right"><button type="submit" class="btn btn-danger" name="updateCart">Cập nhật giỏ hàng</button></div>
      <div class="col-md-1 text-right"><button type="submit" class="btn btn-danger" name="order">Đặt hàng</button></div> 
    </div>
  </form>
          <?php }?>
  </div>
</div>

<?php 
  if(isset($_POST['order'])){
    if(count($_SESSION['cart']) != 0){
      echo "<script> location.assign('index.php?m=order') </script>";
    } else {
      echo "<script>alert('Bạn không thể đặt hàng khi giỏ hàng trống')</script>";
    }
  }
?>

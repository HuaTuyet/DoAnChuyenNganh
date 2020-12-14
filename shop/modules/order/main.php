<?php 
  //status => 1: dang xu li, 2: da xu li, 3: dang giao, 4: hoan thanh
  if(isset($_POST['order'])){
    $data['orderId'] = "order".random_int(0,100);
    $data['createDate'] = date("Y-m-d H:i:s");
    $data['customer'] = $_POST['name'];
    $data['phone'] = $_POST['phone'];
    $data['address'] = $_POST['address'];
    $data['status'] = 1;
    $data['userName'] = $_SESSION['signin']['userName'];
    createOrder($obj, $data);
    foreach($_SESSION['cart'] as $item){
      $data1['orderId'] = $data['orderId'];
      $data1['prodId'] = $item['id'];
      $data1['quantity'] = $item['quantity'];
      $data1['total'] = $item['price'];
      createOrderDetail($obj, $data1);
    }
    //var_dump($data);
    echo "<script>location.replace('index.php?m=cart&s=buyed')</script>";
  }
?>

<!--Banner-->
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>Đơn hàng của bạn</h4>
          <!-- <h2>sixteen products</h2> -->
        </div>
      </div>
    </div>
  </div>
</div>
<!--Banner-->

<div class="products">
  <div class="container">
    <div class="row">
      <div class="col-md-6">     
        <form action="index.php?m=order" method="post" role="form">
          <legend>Thông tin khách hàng</legend>       
          <div class="form-group">
            <label for="">Họ và tên *</label>
            <input name="name" type="text" class="form-control" placeholder="Nguyễn Văn A" required>
          </div> 
          <div class="form-group">
            <label for="">Số điện thoại *</label>
            <input name="phone" type="tel" class="form-control" placeholder="0978421771" pattern="[0-9]{10}" required>
          </div> 
          <div class="form-group">
            <label for="">Địa chỉ nhận hàng *</label>
            <input name="address" type="text" class="form-control" placeholder="Số 10 đường A, xã B, huyện C, tỉnh D" required>
          </div>               
          <button type="submit" class="btn btn-danger" name="order">Đặt hàng</button>
        </form>       
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5">
      <legend>Đơn hàng của bạn</legend>      
      <table class="table" >
        <thead>
          <tr>
            <th>Sản phẩm</th>
            <th>Thành tiền</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $total = 0;
          foreach($_SESSION['cart'] as $item) { 
            $price = $item['price'] * $item['quantity'];
            $total += $price;
        ?>
          <tr>
            <td><?php echo $item['name']," x ",number_format($item['quantity'])?></td>
            <td><?php echo number_format($price) ?></td>
          </tr>
        <?php } ?>
          <tr>
            <td><strong>Tổng tiền</strong></td>
            <td><strong><?php echo number_format($total) ?></strong></td>
          </tr>
        </tbody>
      </table>
      <p><strong>Giao hàng: ship COD<strong></p>
      </div>
    </div>
  </div>
</div>

<?php //$data['order'] = date("H:i:s d/m/Y"); echo $data['order'];
//echo $test;
?>
<?php 
  if(isset($_GET['idorder'])){
    $id = $_GET['idorder'];
  }
  $order = getOrderById($obj, $id);

  $detail = getDetailByOrderId($obj, $id);
  $tongtien = 0;

?>

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Thông tin đơn hàng </h5>
  </div>
  <div class="card-body"> 
    <p> 
      Mã đơn hàng : <?php echo $order["orderId"] ?><br>
      Ngày đặt : <?php echo $order['createDate'] ?><br>
      Tên khách hàng : <?php echo $order['customer'] ?><br>
      Số điện thoại : <?php echo $order['phone'] ?><br>
      Địa chỉ : <?php echo $order['address'] ?><br>
      Tài khoản : <?php echo $order['userName'] ?><br>
      Trạng thái đơn hàng : <?php switch($order['status']){
            case 1:
              echo "CHỜ XỬ LÍ";
            break;
            case 2:
              echo "ĐÃ XỬ LÍ";
            break;
            case 3:
              echo "ĐÃ HỦY";
            break;
          }?>   
              
    </p>
    <table class="table table-bordered  table-sm">
      <thead>
        <tr>
          <th class="text-center">SẢN PHẨM</th>
          <th class="text-center">SỐ LƯỢNG</th>
          <th class="text-center">THÀNH TIỀN</th>
        </tr>
      </thead>
      <tbody> 
      <?php foreach($detail as $v){ 
        $tongtien += $v['total']; ?>    
        <tr>
          <td><?php echo $v['prodName'] ?></td>
          <td><?php echo $v['quantity'] ?></td>
          <td><?php echo number_format($v['total']) ?></td>
        </tr>
      <?php } ?>
      <tr>
        <td colspan="2"><strong>Tổng tiền</strong></td>
        <td><?php echo number_format($tongtien) ?></td>
        </tr>
      </tbody>
    </table><br>
    <form action="" method="post">
      <input type="submit" value="Chấp nhận" class="btn btn-primary" name="acceptOrder">
      <input type="submit" value="Hủy đơn" class="btn btn-danger" name="cancelOrder">
    </form>
  </div>
</div>
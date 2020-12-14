<?php 
  $list = getAllOrder($obj);
?>

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Danh sách đơn hàng</h5>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-hover table-striped table-sm">
      <thead>
        <tr>
          <th class="text-center">Mã đơn hàng</th>
          <th class="text-center">Tên khách hàng</th>
          <th class="text-center">Tình trạng</th>
          <th class="text-center">Tác vụ</th>
        </tr>
      </thead>
      <tbody>
       <?php foreach($list as $order){?>
        <tr>
          <td><?php echo $order['orderId'] ?></td>
          <td><?php echo $order['customer'] ?></td>
          <td><?php switch($order['status']){
            case 1:
              echo "Chờ xử lí";
            break;
            case 2:
              echo "Đã xử lí";
            break;
            case 3:
              echo "Đã hủy";
            break;
          } ?></td>
          <td>
            <a href="index.php?m=order&p=detail&idorder=<?php echo $order['orderId']?>">Xem thông tin</a>
          </td>
        </tr>
       <?php } ?>
      </tbody>
    </table>
  </div>
</div>
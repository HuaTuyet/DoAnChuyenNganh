<?php
//   function getProducts($obj, $id){
//     $br = $obj->prepare("SELECT COUNT(*) FROM t_product WHERE prodBrand = :id");
//     $br->bindParam(":id", $id, PDO::PARAM_STR);
//     $br->execute();
//     $data = $br->fetch();
//     var_dump($data);
//     echo $data[0];
//   }
// getProducts($obj, "br02");

?>

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Danh sách thương hiệu</h5>
  </div>
  <div class="card-body">
    <?php if(isset($_GET['error'])){
      if($_GET['error'] == "cannotdelete"){
        $slsp = $_GET['slsp'];
        echo "<p>Không thể xóa vì đang có ".$slsp." sản phẩm thuộc thương hiệu này !</p>";
      } else {
        echo "";
      }
    }; 
    ?>
    <table class="table table-bordered table-hover table-striped table-sm">
      <thead>
        <tr>
          <th class="text-center">Stt</th>
          <th class="text-center">Mã</th>
          <th class="text-center">Tên</th>
          <th class="text-center">Tác vụ</th>
        </tr>
      </thead>
      <tbody>
        <?php 
              $sql = "select * from t_brand";
              $temp = $obj->query($sql);
              $data = $temp->fetchAll();
              $stt = 0;
              foreach($data as $key=>$value) {
                $stt++;
            ?>

        <tr>
          <td><?php echo $stt?></td>
          <td><?php echo $value['brandId']?></td>
          <td><?php echo $value['brandName']?></td>
          <td class="text-center">
            <a href="index.php?m=brand&p=delete&id=<?php echo $value['brandId']?>" class="btn btn-danger">
              <i class="fas fa-trash-alt"></i> Xóa
            </a>
            <a href="index.php?m=brand&p=edit&id=<?php echo $value['brandId']?>" class="btn btn-primary">
              <i class="fas fa-pencil-alt"></i> Sửa
            </a>
          </td>
        </tr>
        <?php } $obj = null; ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    <a href="index.php?m=brand&p=create" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm</a>
  </div>
</div>
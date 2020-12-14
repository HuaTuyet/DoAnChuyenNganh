<!--List Brand-->
<div class="card">
  <div class="card-header">
    <h5 class="card-title">Danh sách loại sản phẩm</h5>
  </div>
  <div class="card-body">
  <?php if(isset($_GET['error'])){
      if($_GET['error'] == "cannotdelete"){
        echo "<p>Không thể xóa vì đang có sản phẩm thuộc loại này !</p>";
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
              $data = getAllCategories($obj);
              $stt = 0;
              foreach($data as $key=>$value) {
                $stt++;
            ?>

        <tr>
          <td><?php echo $stt?></td>
          <td><?php echo $value['cateId']?></td>
          <td><?php echo $value['cateName']?></td>
          <td class="text-center">
            <a 
              onclick="confirmDelete()"
              href="index.php?m=categories&p=delete&id=<?php echo $value['cateId']?>" 
              class="btn btn-danger"
            >
              <i class="fas fa-trash-alt"></i> Xóa
            </a>
            <a href="index.php?m=categories&p=edit&id=<?php echo $value['cateId']?>" class="btn btn-primary">
              <i class="fas fa-pencil-alt"></i> Sửa
            </a>
          </td>
        </tr>
        <?php } $obj = null; ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    <a href="index.php?m=categories&p=create" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm</a>
  </div>
</div>
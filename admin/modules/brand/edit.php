<?php 
  if(isset($_GET['id'])){
    $data = getBrand($obj, $_GET['id']);
  }
?>

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Chỉnh sửa thương hiệu</h5>
  </div>
  <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="brandId">Mã thương hiệu</label>
        <input 
          type="text" 
          class="form-control" 
          id="brandId" 
          name="brandId"
          value=<?php echo $data["brandId"]?>
        >
        <?php echo $error ?>
      </div>
      <div class="form-group">
        <label for="brandName">Tên thương hiệu</label>
        <input 
          type="text" 
          class="form-control" 
          id="brandName" 
          name="brandName"
          value=<?php echo $data["brandName"]?>
        >
      </div>
      <button type="submit" class="btn btn-primary" name="btnEditBrand">Cập nhật</button>
    </form>
  </div>
</div>
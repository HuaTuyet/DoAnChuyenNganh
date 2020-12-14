<?php 
//if(isset($_POST["btnCreateBrand"])){
  //   $data["brandId"] = $_POST["brandId"];
  //   $data["brandName"] = $_POST["brandName"];
  //   createBrand($obj, $data);
  //   header("location:index.php?m=brand&p=list");
  //   exit();
  // };
?>
<div class="card">
  <div class="card-header">
    <h5 class="card-title">Thêm thương hiệu</h5>
  </div>
  <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="brandId">Mã thương hiệu</label>
        <input type="text" class="form-control" id="brandId" name="brandId">
      </div>
      <div class="form-group">
        <label for="brandName">Tên thương hiệu</label>
        <input type="text" class="form-control" id="brandName" name="brandName">
      </div>
      <button type="submit" class="btn btn-primary" name="btnCreateBrand">Tạo</button>
    </form>
  </div>
</div>
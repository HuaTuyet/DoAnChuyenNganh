<?php 
  if(isset($_GET['id'])){
    $data = getCategories($obj, $_GET['id']);
  }
?>
<div class="card">
  <div class="card-header">
    <h5 class="card-title">Chỉnh sửa loại sản phẩm</h5>
  </div>
  <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="cateId">Mã loại</label>
        <input 
          type="text" 
          class="form-control" 
          id="cateId" 
          name="cateId"
          value=<?php echo $data["cateId"]?>
        >
        <?php echo $error ?>
      </div>
      <div class="form-group">
        <label for="cateName">Tên loại</label>
        <input 
          type="text" 
          class="form-control" 
          id="cateName" 
          name="cateName"
          value="<?php echo $data["cateName"]?>"
        >
      </div>
      <button type="submit" class="btn btn-primary" name="btnEditCate">Cập nhật</button>
    </form>
  </div>
</div>
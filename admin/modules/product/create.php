
<div class="card">
  <div class="card-header">
    <h5 class="card-title">Thêm sản phẩm</h5>
  </div>
  <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="prodId">Mã sản phẩm</label>
        <input type="text" class="form-control" id="prodId" name="prodId">
      </div>
      <div class="form-group">
        <label for="prodName">Tên sản phẩm</label>
        <input type="text" class="form-control" id="prodName" name="prodName">
      </div>
      <div class="form-group">
        <label for="price">Đơn giá</label>
        <input type="number" class="form-control" id="price" name="price">
      </div>
      <div class="form-group">
        <label for="prodBrand">Thương hiệu</label>
        <select class="form-control" id="prodBrand" name="prodBrand">
          <?php 
            $prodBrands = getAllBrand($obj);
            foreach($prodBrands as $prodBrand){
          ?>
          <option value="<?php echo $prodBrand['brandId'] ?>"><?php echo $prodBrand['brandName'] ?></option>
            <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="prodType">Loại sản phẩm</label>
        <select class="form-control" id="prodType" name="prodType">
          <?php 
            $prodTypes = getAllCategories($obj);
            foreach($prodTypes as $prodType){
          ?>
          <option value="<?php echo $prodType['cateId'] ?>"><?php echo $prodType['cateName'] ?></option>
            <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="prodImage">Hình ảnh</label>
        <input type="file" class="form-control-file" id="prodImage" name="prodImage">
      </div>
      <div class="form-group">
        <label for="prodDes">Mô tả</label>
        <textarea class="form-control" rows="3" id="prodDes" name="prodDes"></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="btnCreateProduct">Tạo</button>
    </form>
  </div>
</div>
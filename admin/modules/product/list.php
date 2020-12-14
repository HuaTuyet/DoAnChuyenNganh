<!--List Brand-->
<div class="card">
  <div class="card-header">
    <h5 class="card-title">Danh sách sản phẩm</h5>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-hover table-striped table-sm">
      <thead>
        <tr>
          <th class="text-center">Stt</th>
          <th class="text-center">Mã</th>
          <th class="text-center">Tên</th>
          <th class="text-center">Giá</th>
          <th class="text-center">Thương hiệu</th>
          <th class="text-center">Loại sản phẩm</th>
          <th class="text-center">Hình ảnh</th>
          <th class="text-center">Mô tả</th>
          <th class="text-center">Tác vụ</th>
        </tr>
      </thead>
      <tbody>
        <?php  
          $brandList = getAllBrand($obj);
          $data = getAllProduct($obj);
          $stt = 0;
          foreach($data as $key=>$value){
            $stt++;
        ?>  
        <tr>
          <td><?php echo $stt ?></td>
          <td><?php echo $value['prodId'] ?></td>
          <td><?php echo $value['prodName'] ?></td>
          <td><?php echo $value['price'] ?></td>
          <td><?php 
            foreach($brandList as $k=>$v){
              if($v['brandId'] == $value['prodBrand']){
                echo $v['brandName'];
              }
            }
          ?>
          </td>
          <td><?php echo $value['prodType'] ?></td>
          <td><img src="../public/images/products/<?php echo $value['prodImage'] ?>" width="50px" ></td>
          <td width="300px"><?php echo $value['prodDes'] ?></td>
          <td class="text-center">
            <a 
              onclick="confirmDelete()"
              href="index.php?m=product&p=delete&id=<?php echo $value['prodId']?>" 
              class="btn btn-danger"
            >
              <i class="fas fa-trash-alt"></i> Xóa
            </a>
            <a href="index.php?m=product&p=edit&id=<?php echo $value['prodId']?>" class="btn btn-primary">
              <i class="fas fa-pencil-alt"></i> Sửa
            </a>
          </td>
        </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>
  <div class="card-footer">
    <a href="index.php?m=product&p=create" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm</a>
  </div>
</div>
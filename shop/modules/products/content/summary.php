<div class="row">
      <div class="col-md-3">
        <h5 class="right-product">THƯƠNG HIỆU</h5>
        <?php include "show_brands.php" ?>
      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                <li><a href="index.php?m=products" class="text-main">Tất cả</a></li>
                <li><a href="index.php?m=products&type=gk" class="text-main">Gọng kính</a></li>
                <li><a href="index.php?m=products&type=tk" class="text-main">Tròng kính</a></li>
                <!--data-filter=".dev"-->
                <li><a href="index.php?m=products&type=km" class="text-main">Kính mát</a></li>
                <!--data-filter=".gra"-->
              </ul>
            </div>
          </div>

          <!--SẢN PHẨM-->
          <?php include "show_products.php" ?>
        </div>
      </div>
    </div>

    <!--CHUYỂN TRANG-->
    <div class="row">
      <div class="col-md-12">
        <ul class="pages">
          <?php
            for($i = 1; $i <= $totalPage; $i++){ 
             if(isset($type)){?>
          <li class="active">
            <a href="index.php?m=products&type=<?php echo $type ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
          </li>

          <?php } else if(isset($brand)){?>
          <li class="active">
            <a href="index.php?m=products&brand=<?php echo $brand ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
          </li>

          <?php } else { ?>
          <li class="active">
            <a href="index.php?m=products&page=<?php echo $i ?>"><?php echo $i ?></a>
          </li>
          <?php } }?>

          <!-- <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li> -->
        </ul>
      </div>
    </div>
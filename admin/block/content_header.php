<?php 
  $h1 = "Dashboard";
  $item = "";
  if(isset($_GET['m'])){
    $m = $_GET['m'];
    switch($m){
      case "brand":
        $h1 = "Thương hiệu";
      break;
      case "categories":
        $h1 = "Loại sản phẩm";
      break;
      case "product": 
        $h1 = "Sản phẩm";
      break;
      case "order":
        $h1 = "Đơn đặt hàng";
      break;
      default:
      $h1 = "Dashboard"; 
    }
  }
  if(isset($_GET['p'])){
    $p = $_GET['p'];
    switch($p){
      case "list":
        $item = "Danh sách";
      break;
      case "create":
        $item = "Thêm";
      break;
      case "edit":
        $item = "Sửa";
      break;
      default:
      $item = ""; 
    }
  }
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> <?php echo $h1 ?> </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $h1 ?></li>
          <li class="breadcrumb-item active"><?php echo $item ?></li>
        </ol>
      </div>
    </div>
  </div>
</div>
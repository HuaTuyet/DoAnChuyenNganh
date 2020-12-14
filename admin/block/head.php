<?php 
  $title = "Dashboard";
  if(isset($_GET['m'])){
    $m = $_GET['m'];
    switch($m){
      case "brand":
        $title = "Thương hiệu";
      break;
      case "categories":
        $title = "Loại sản phẩm";
      break;
      case "product": 
        $title = "Sản phẩm";
      break;
      case "order":
        $title = "Đơn đặt hàng";
      break;
      default:
      $title = "Dashboard"; 
    }
  }
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>AdminLTE 3 | <?php echo $title ?> </title>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- IonIcons -->
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
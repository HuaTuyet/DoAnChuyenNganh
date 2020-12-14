<?php 
  function getProductList($obj, $perPage, $start = 0){
    $sm = $obj->prepare("SELECT * FROM t_product ORDER BY prodId LIMIT $start, $perPage");
    $sm->execute();
    $data = $sm->fetchAll();
    return $data;
  }
  function getProductByType($obj, $type, $perPage, $start = 0){
    $sm = $obj->prepare("SELECT * FROM t_product where prodType = :prodType ORDER BY prodId LIMIT $start, $perPage");
    $sm->bindParam(":prodType", $type, PDO::PARAM_STR);
    $sm->execute();
    $data = $sm->fetchAll();
    return $data;
  }

  // Lấy số lượng sản phẩm theo loại
  function getTotalRowType($obj, $type){
    $sm = $obj->prepare("SELECT * FROM t_product WHERE prodType = :prodType ORDER BY prodId");
    $sm->bindParam(":prodType", $type, PDO::PARAM_STR);
    $sm->execute();
    return $sm->rowCount();
  }
  function getTotalRowBrand($obj, $brand){
    $sm = $obj->prepare("SELECT * FROM t_product WHERE prodBrand = :prodBrand ORDER BY prodId");
    $sm->bindParam(":prodBrand", $brand, PDO::PARAM_STR);
    $sm->execute();
    return $sm->rowCount();
  }
  function getTotalRow($obj){
    $sm = $obj->prepare("SELECT * FROM t_product ORDER BY prodId");
    $sm->execute();
    return $sm->rowCount();
  }

  //Lấy thương hiệu
  function getAllBrand($obj){
    $sm = $obj->prepare("SELECT * FROM t_brand ORDER BY brandId");
    $sm->execute();
    $data = $sm->fetchAll();
    return $data;
  }
  function getProductByBrand($obj, $brand, $perPage, $start = 0){
    $sm = $obj->prepare("SELECT * FROM t_product where prodBrand = :prodBrand ORDER BY prodId LIMIT $start, $perPage");
    $sm->bindParam(":prodBrand", $brand, PDO::PARAM_STR);
    $sm->execute();
    $data = $sm->fetchAll();
    return $data;
  }

  function getProductById($obj, $id){
    $sm = $obj->prepare("SELECT t_product.*, t_brand.brandName FROM t_product LEFT JOIN t_brand
    ON t_product.prodBrand = t_brand.brandId WHERE prodId = :id");
    $sm->bindParam(":id", $id, PDO::PARAM_STR);
    $sm->execute();
    $product = $sm->fetch();
    return $product;
  }

  // function findProductExactly($obj, $name){
  //   $sm = $obj->prepare("SELECT * FROM t_product WHERE prodName LIKE '$name'");
  //   //$sm->bindParam(":name", $name, PDO::PARAM_STR);
  //   $sm->execute();
  //   $data = $sm->fetch();
  //   return $data;
  // }
   function findProduct($obj, $name){
    $sm = $obj->prepare("SELECT * FROM t_product WHERE prodName LIKE '%$name%'");
    //$sm->bindParam(":name", $name, PDO::PARAM_STR);
    $sm->execute();
    $data = $sm->fetchAll();
    return $data;
  }
  
  function createOrder($obj, $data){
    $sm = $obj->prepare("INSERT INTO t_order VALUES(:orderId, :createDate, :customer, 
    :phone, :address, :status, :userName)");
    $sm->execute($data);
    return true;
  }
  function createOrderDetail($obj, $data){
    $sm = $obj->prepare("INSERT INTO t_orderdetail VALUES(:orderId, :prodId, :quantity, :total)");
    $sm->execute($data);
    
  }
?>

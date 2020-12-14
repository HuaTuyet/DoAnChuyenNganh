<?php
  function createProduct($obj, $data){
    $br = $obj->prepare("INSERT INTO t_product VALUES(:prodId, :prodName, :prodDes, :price, :prodBrand, :prodType, :prodImage)");
    $br->bindParam(":prodId", $data["prodId"], PDO::PARAM_STR);
    $br->bindParam(":prodName", $data["prodName"], PDO::PARAM_STR);
    $br->bindParam(":prodDes", $data["prodDes"], PDO::PARAM_STR);
    $br->bindParam(":price", $data["price"], PDO::PARAM_INT);
    $br->bindParam(":prodBrand", $data["prodBrand"], PDO::PARAM_STR);
    $br->bindParam(":prodType", $data["prodType"], PDO::PARAM_STR);
    $br->bindParam(":prodImage", $data["prodImage"], PDO::PARAM_STR);
    $br->execute();
  }
  function deleteProduct($obj, $id){
    $br = $obj->prepare("DELETE FROM t_product WHERE prodId = :id");
    $br->bindParam(":id", $id, PDO::PARAM_STR);
    $br->execute();
  }
  function getAllProduct($obj){
    $sql = "SELECT * FROM t_product";
    $temp = $obj->query($sql);
    $data = $temp->fetchAll();
    return $data;
  }
  function getProduct($obj, $id){
    $br = $obj->prepare("SELECT * FROM t_product WHERE prodId = :id");
    $br->bindParam(":id", $id, PDO::PARAM_STR);
    $br->execute();
    $data = $br->fetch();
    return $data;
  }
  function updateProduct($obj, $data){
    $br = $obj->prepare("UPDATE t_product 
                SET prodName = :prodName, prodDes = :prodDes, price = :price, 
                prodBrand = :prodBrand, prodType = :prodType, prodImage = :prodImage 
                WHERE prodId = :prodId");
    $br->bindParam(":prodId", $data["prodId"], PDO::PARAM_STR);
    $br->bindParam(":prodName", $data["prodName"], PDO::PARAM_STR);
    $br->bindParam(":prodDes", $data["prodDes"], PDO::PARAM_STR);
    $br->bindParam(":price", $data["price"], PDO::PARAM_INT);
    $br->bindParam(":prodBrand", $data["prodBrand"], PDO::PARAM_STR);
    $br->bindParam(":prodType", $data["prodType"], PDO::PARAM_STR);
    $br->bindParam(":prodImage", $data["prodImage"], PDO::PARAM_STR);
    $br->execute();
  }
  // function getNameBrandOfProduct($obj){
  //   $br = $obj->prepare("SELECT t_product.prodBrand, t_brand.brandName FROM t_product, t_brand
  //               WHERE t_product.prodBrand = t_brand.BrandId");
  //   $br->execute();
  //   $data = $br->fetchAll();
  //   return $data;
  // }
  // function getNameCategoryOfProduct($obj){
  //   $br = $obj->prepare("SELECT t_product.prodType, t_categories.cateName FROM t_product, t_categories
  //               WHERE t_product.prodType = t_categories.cateId");
  //   $br->execute();
  //   $data = $br->fetchAll();
  //   return $data;
  // }

  //Add Brand
  if(isset($_POST["btnCreateProduct"])){
    $data["prodId"] = $_POST["prodId"];
    $data["prodName"] = $_POST["prodName"];
    $data["prodDes"] = $_POST["prodDes"]; 
    $data["price"] = $_POST["price"];
    $data["prodBrand"] = $_POST["prodBrand"]; 
    $data["prodType"] = $_POST["prodType"]; 
    $data["prodImage"] = $_FILES["prodImage"]["name"]; //get through $_FILES

    createProduct($obj, $data);
    //Moving image
    if($_FILES["prodImage"]["name"] != ""){
      $imgType = array("jpg", "png", "jpeg", "gif");
      $ex = pathinfo($_FILES["prodImage"]["name"], PATHINFO_EXTENSION);
      echo $ex;
      if(in_array($ex, $imgType)){
        $des = "../public/images/products/".$_FILES["prodImage"]["name"];
        move_uploaded_file($_FILES["prodImage"]["tmp_name"], $des);
      }
    }
    header("Location:index.php?m=product&p=list");
    exit();
  };

  if(isset($_GET["m"]) && $_GET["m"] == "product"){
    if(isset($_GET["p"]) && isset($_GET["id"])){
    $id = $_GET["id"];
    //Delete
    if($_GET["p"] == "delete"){  
      deleteProduct($obj, $id);
      header("Location:index.php?m=product&p=list");
    }
    //Edit
    if($_GET["p"] == "edit"){
      $product = getProduct($obj, $id);
      $error = "";
      if(isset($_POST["btnEditProduct"])){
        $dataNew["prodId"] = $_POST["prodId"];
        $dataNew["prodName"] = $_POST["prodName"];
        $dataNew["prodDes"] = $_POST["prodDes"]; 
        $dataNew["price"] = $_POST["price"];
        $dataNew["prodBrand"] = $_POST["prodBrand"]; 
        $dataNew["prodType"] = $_POST["prodType"];
        $imageNew = $_FILES["prodImage"]["name"]; 
        $dataNew["prodImage"] = $imageNew == "" ? $product["prodImage"] : $imageNew;        
        if($dataNew["prodId"] != $id){
          $error = "<div class='text-danger'>Không thể chỉnh sửa mã</div>";
        }
        else{     
          //var_dump($dataNew);    
          updateProduct($obj, $dataNew);
          if($imageNew != ""){
            $imgType = array("jpg", "png", "jpeg", "gif");
            $ex = pathinfo($_FILES["prodImage"]["name"], PATHINFO_EXTENSION);
            echo $ex;
            if(in_array($ex, $imgType)){
              $des = "../public/images/products/".$_FILES["prodImage"]["name"];
              move_uploaded_file($_FILES["prodImage"]["tmp_name"], $des);
            }
          }
          header("Location: index.php?m=product&p=list");
        }
      }
    }
  }
  }
  

?>
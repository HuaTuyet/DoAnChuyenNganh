<?php
  function createBrand($obj, $data){
    $br = $obj->prepare("INSERT INTO t_brand VALUES(:brandId, :brandName)");
    $br->execute($data);
  }
  function deleteBrand($obj, $id){
    $result = "";
    $br = $obj->prepare("SELECT brandId FROM t_brand WHERE brandId = :id  
    AND brandId IN (SELECT prodBrand FROM t_product)");
    $br->bindParam(":id", $id, PDO::PARAM_STR);
    $br->execute();
    $data = $br->fetchAll();
    if($data == null){
      $sm = $obj->prepare("DELETE FROM t_brand WHERE brandId = :id");
      $sm->bindParam(":id", $id, PDO::PARAM_STR);
      $sm->execute();
    } else {
      $result = "cannotdelete";
    }
    return $result;
  } 
  function updateBrand($obj, $data){
    $br = $obj->prepare("UPDATE t_brand SET brandName = :brandName WHERE brandId = :id");
    $br->bindParam(":id", $data["brandId"], PDO::PARAM_STR);
    $br->bindParam(":brandName", $data["brandName"], PDO::PARAM_STR);
    $br->execute();
  }
  function getAllBrand($obj){
    $sql = "SELECT * FROM t_brand";
    $temp = $obj->query($sql);
    $data = $temp->fetchAll();
    return $data;
  }
  function getBrand($obj, $id){
    $br = $obj->prepare("SELECT * FROM t_brand WHERE brandId = :id");
    $br->bindParam(":id", $id, PDO::PARAM_STR);
    $br->execute();
    $data = $br->fetch();
    return $data;
  }
  function getQuantityProducts($obj, $id){
    $br = $obj->prepare("SELECT COUNT(*) FROM t_product WHERE prodBrand = :id");
    $br->bindParam(":id", $id, PDO::PARAM_STR);
    $br->execute();
    $data = $br->fetch();
    return $data[0];
  }

  //Add Brand
  if(isset($_POST["btnCreateBrand"])){
    $data["brandId"] = $_POST["brandId"];
    $data["brandName"] = $_POST["brandName"];
    createBrand($obj, $data);
    header("Location:index.php?m=brand&p=list");
    exit();
  };

   if(isset($_GET["m"]) && $_GET["m"] == "brand"){
      if(isset($_GET["p"]) && isset($_GET["id"])){
    //Delete
    $id = $_GET["id"];
    if($_GET["p"] == "delete"){  
      $delete = deleteBrand($obj, $id); //var_dump($test); 
      $quantity = getQuantityProducts($obj, $id);
      header("Location:index.php?m=brand&p=list&error=$delete&slsp=$quantity");
    }
    //Edit
    if($_GET["p"] == "edit"){
      $error="";
      if(isset($_POST["btnEditBrand"])){
        $dataNew["brandId"] = $_POST["brandId"];
        $dataNew["brandName"] = $_POST["brandName"];
       
        if($dataNew["brandId"] != $id){
          $error = "<div class='text-danger'>Không thể chỉnh sửa mã</div>";
        }
        else{
          updateBrand($obj, $dataNew);
          header("Location: index.php?m=brand&p=list");
        }
      }
    }
  }
   }
  

?>
<?php
  function createCategories($obj, $data){
    $br = $obj->prepare("INSERT INTO t_categories VALUES(:cateId, :cateName)");
    $br->execute($data);
  }
  function deleteCategories($obj, $id){
    $result = "";
    $br = $obj->prepare("SELECT cateId FROM t_categories WHERE cateId = :id  
    AND cateId IN (SELECT prodType FROM t_product)");
    $br->bindParam(":id", $id, PDO::PARAM_STR);
    $br->execute();
    $data = $br->fetchAll();
    if($data == null){
      $sm = $obj->prepare("DELETE FROM t_categories WHERE cateId = :id");
      $sm->bindParam(":id", $id, PDO::PARAM_STR);
      $sm->execute();
    } else {
      $result = "cannotdelete";
    }
    return $result;
  } 
  function getAllCategories($obj){
    $sql = "SELECT * FROM t_categories";
    $temp = $obj->query($sql);
    $data = $temp->fetchAll();
    return $data;
  }
  function getCategories($obj, $id){
    $br = $obj->prepare("SELECT * FROM t_categories WHERE cateId = :id");
    $br->bindParam(":id", $id, PDO::PARAM_STR);
    $br->execute();
    $data = $br->fetch();
    return $data;
  }
  function updateCategories($obj, $data){
    $br = $obj->prepare("UPDATE t_categories SET cateName = :cateName WHERE cateId = :id");
    $br->bindParam(":id", $data["cateId"], PDO::PARAM_STR);
    $br->bindParam(":cateName", $data["cateName"], PDO::PARAM_STR);
    $br->execute();
  }

  //Add Brand
  if(isset($_POST["btnCreateCate"])){
    $data["cateId"] = $_POST["cateId"];
    $data["cateName"] = $_POST["cateName"];
    createCategories($obj, $data);
    header("Location:index.php?m=categories&p=list");
    exit();
  };

  if(isset($_GET["m"]) && $_GET["m"] == "categories"){
    if(isset($_GET["p"]) && isset($_GET["id"])){
    //Delete
    $id = $_GET["id"];
    if($_GET["p"] == "delete"){  
      $delete = deleteCategories($obj, $id);
      header("Location:index.php?m=categories&p=list&error=$delete");
    }
    //Edit
    if($_GET["p"] == "edit"){
      $error = "";
      if(isset($_POST["btnEditCate"])){
        $dataNew["cateId"] = $_POST["cateId"];
        $dataNew["cateName"] = $_POST["cateName"];
        
        if($dataNew["cateId"] != $id){
          $error = "<div class='text-danger'>Không thể chỉnh sửa mã</div>";
        }
        else{
          updateCategories($obj, $dataNew);
          header("Location: index.php?m=categories&p=list");
        }
      }
    }
  }
  }
  

?>
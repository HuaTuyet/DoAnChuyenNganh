<?php 
  function getAllOrder($obj){
      $sql = "SELECT * FROM t_order";
      $temp = $obj->query($sql);
      $data = $temp->fetchAll();
      return $data;
    }
  function getOrderById($obj, $id){
      $sm = $obj->prepare("SELECT * FROM t_order WHERE orderId = :id");
      $sm->bindParam(":id", $id, PDO::PARAM_STR);
      $sm->execute();
      $data = $sm->fetch();
      return $data;
    }
  function getDetailByOrderId($obj, $id){
      $sm = $obj->prepare("SELECT t_orderdetail.*, t_product.prodName FROM t_orderdetail LEFT JOIN t_product
      ON t_orderdetail.prodId = t_product.prodId WHERE orderId = :id");
      $sm->bindParam(":id", $id, PDO::PARAM_STR);
      $sm->execute();
      $data = $sm->fetchAll();
      return $data;
    }
  function updateStatus($obj, $id, $status){
      $sm = $obj->prepare("UPDATE t_order SET status = :status WHERE orderId = :id");
      $sm->bindParam(":id", $id, PDO::PARAM_STR);
      $sm->bindParam(":status", $status, PDO::PARAM_INT);
      $sm->execute();
    }

  if(isset($_POST['acceptOrder'])){
    updateStatus($obj, $_GET['idorder'], 2);
    header("Refresh:0");
  }
   if(isset($_POST['cancelOrder'])){
    updateStatus($obj, $_GET['idorder'], 3);
    header("Refresh:0");
  }
?>
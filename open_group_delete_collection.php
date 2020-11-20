<?php

$Errmsg='';
$memberNoNum1 = isset($_GET["memberNoNum1"]) ? $_GET["memberNoNum1"] : "";
$groupNo = isset($_GET["groupNo"]) ? $_GET["groupNo"] : "";

try{
  require_once('./connectbook.php');
  
  if($memberNoNum1!=""){   
      $sql="delete from food_group_collection where MEMBER_NO=$memberNoNum1 and GROUP_NO =$groupNo;";

      $products = $pdo->prepare($sql);
      $products->execute();
  }else{
     //找尋
     $sql1="SELECT * FROM food_group_collection;";

     //找尋
     $data1 = $pdo->prepare($sql1);
     $data1-> execute();
     $data1Rows = $data1->fetchAll(PDO::FETCH_ASSOC);
     $result = $data1Rows;
     
  }

}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  echo $Errmsg;
}



?>


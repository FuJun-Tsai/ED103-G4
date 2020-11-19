<?php

$Errmsg='';
$memberNoNum1 = isset($_GET["memberNoNum1"]) ? $_GET["memberNoNum1"] : "";
$groupNo = isset($_GET["groupNo"]) ? $_GET["groupNo"] : "";

try{
  require_once('./connectbook.php');
  //寫入
  if($memberNoNum1!=""){    
      $sql="insert into food_group_collection (MEMBER_NO, GROUP_NO) VALUES ($memberNoNum1,$groupNo);";

      //寫入
      $data = $pdo->prepare($sql);
      $data-> execute();
      $dataRows = $data->fetchAll(PDO::FETCH_ASSOC);
      $result[0] = $dataRows;
  }
  else{
    //找尋
      $sql1="SELECT * FROM food_group_collection;";
      // $sql1="SELECT * FROM food_group_collection where MEMBER_NO=;";

      //找尋
      $data1 = $pdo->prepare($sql1);
      $data1-> execute();
      $data1Rows = $data1->fetchAll(PDO::FETCH_ASSOC);
      $result = $data1Rows;


  }


echo json_encode($result);



}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  echo $Errmsg;
}



?>


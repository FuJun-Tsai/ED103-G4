<?php
$Errmsg='';
$groupNo = isset($_GET["groupNo"]) ? $_GET["groupNo"] : "";
$groupName = isset($_GET["groupName"]) ? $_GET["groupName"] : "";
$resNo = isset($_GET["resNo"]) ? $_GET["resNo"] : "";
$mealDate = isset($_GET["mealDate"]) ? $_GET["mealDate"] : "";
$nowNumJoin = isset($_GET["nowNumJoin"]) ? $_GET["nowNumJoin"] : "";
$nowNumMax = isset($_GET["nowNumMax"]) ? $_GET["nowNumMax"] : "";


try{
  require_once('connectRes.php');

  $sql="select * from food_group;
  insert into food_group(
  RES_NO, 
  GROUP_NAME, 
  START_TIME, 
  END_TIME, 
  MAX_NUMBER, 
  JOIN_NUMBER,
  MEAL_TIME)
  VALUES (,$resNo,'$groupName',CURRENT_DATE(),'$mealDate'+interval-1 day,$nowNumMax,$nowNumJoin,'$mealDate');";
$products = $pdo->prepare($sql);
$products->execute();
// $resNo,$groupName,CURRENT_DATE(),$mealDate+interval-1 day,$nowNumMax ,$nowNumJoin,$mealDate

// echo $sql;
  // $sql="select CURDATE()";
  // $data = $pdo->prepare($sql);
  // $data-> execute();
  // $dataRows = $data->fetchAll(PDO::FETCH_ASSOC);
  // echo $dataRows;
  // echo $groupNo,'<br>';
  // echo $groupName,'<br>';
  // echo $resNo,'<br>';
  // echo $mealDate,'<br>';
  // echo $nowNumJoin,'<br>';
  // echo $nowNumMax,'<br>';
  // echo $friendCheckboxVal[0],'<br>';
}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  // echo $Errmsg;
}

// if($data->rowCount()==0){
//   echo '資料有誤';
// }else{
//   $result = $data->fetchAll(PDO::FETCH_ASSOC);
//   echo JSON_encode($result);
// }

?>
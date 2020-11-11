<?php
$Errmsg='';
$groupNo = isset($_GET["groupNo"]) ? $_GET["groupNo"] : "";
$groupName = isset($_GET["groupName"]) ? $_GET["groupName"] : "";
$resNo = isset($_GET["resNo"]) ? $_GET["resNo"] : "";
$mealDate = isset($_GET["mealDate"]) ? $_GET["mealDate"] : "";
$nowNumJoin = isset($_GET["nowNumJoin"]) ? $_GET["nowNumJoin"] : "";
$nowNumMax = isset($_GET["nowNumMax"]) ? $_GET["nowNumMax"] : "";
$friendCheckboxVal=isset($_GET["friendCheckboxVal"]) ? $_GET["friendCheckboxVal"] : "";
$memNo = isset($_GET["memNo"]) ? $_GET["memNo"] : "";
$groupNo3 = isset($_GET["groupNo3"]) ? $_GET["groupNo3"] : "";

// echo $memNo;
// echo $groupNo3;
// echo $friendCheckboxVal[0];
// echo gettype($friendCheckboxVal[0]);
// echo $nowNumJoin;

try{
  require_once('connectRes.php');

  $sql="select * from food_group;
  insert into food_group(
  MEMBER,
  GROUP_NO, 
  RES_NO, 
  GROUP_NAME, 
  START_TIME, 
  END_TIME, 
  MAX_NUMBER, 
  JOIN_NUMBER,
  MEAL_TIME)
  VALUES (1,$groupNo,$resNo,'$groupName',CURRENT_DATE(),'$mealDate'+interval-1 day,$nowNumMax,$nowNumJoin,'$mealDate');";
$products = $pdo->prepare($sql);
$products->execute();


for($i=0;$i<count($friendCheckboxVal);$i++){

  // echo $friendCheckboxVal[$i],'<br>';
  // echo $groupNo;
  $sql1=" 
  select * from food_group_people;
  insert into food_group_people( 
  GROUP_NO, 
  MEMBER_NO, 
  MEMBER_STATUS)
  VALUES ($groupNo,$friendCheckboxVal[$i],0);";

  $products = $pdo->prepare($sql1);
  $products->execute();
}

// echo count($friendCheckboxVal);

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
  echo $Errmsg;
}

// if($data->rowCount()==0){
//   echo '資料有誤';
// }else{
//   $result = $data->fetchAll(PDO::FETCH_ASSOC);
//   echo JSON_encode($result);
// }

?>
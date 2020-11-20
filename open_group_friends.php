<?php

$Errmsg='';
$friendNo = isset($_GET["friendNo"]) ? $_GET["friendNo"] : "";
$memberNoNum1 = isset($_GET["memberNoNum1"]) ? $_GET["memberNoNum1"] : "";

try{
  require_once('./connectbook.php');
  //加入好友
$sql="insert into food_group_people (GROUP_NO, MEMBER_NO, MEMBER_STATUS) VALUES ($groupNo3,$memNo,2);";

$products = $pdo->prepare($sql);
$products->execute();


}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  echo $Errmsg;
}


?>


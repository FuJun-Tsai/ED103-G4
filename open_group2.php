<?php


$memNo = isset($_GET["memNo"]) ? $_GET["memNo"] : "";
$groupNo3 = isset($_GET["groupNo3"]) ? $_GET["groupNo3"] : "";

try{
  require_once('connectRes.php');
  
$sql2="insert into food_group_people (GROUP_NO, MEMBER_NO, MEMBER_STATUS) VALUES ($groupNo3,$memNo,2);";

$products = $pdo->prepare($sql2);
$products->execute();


}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  echo $Errmsg;
}



?>


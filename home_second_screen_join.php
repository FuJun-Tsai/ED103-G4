<?php
session_start();
$Errmsg='';
$groupNo3 = isset($_GET["groupNo3"]) ? $_GET["groupNo3"] : "";
$MEMBER_NO = isset($_SESSION["MEMBER_NO"]) ? $_SESSION["MEMBER_NO"] : "";


try{
  require_once('./connectbook.php');
  //陌生人加入
$sql2="insert into food_group_people (GROUP_NO, MEMBER_NO, MEMBER_STATUS) VALUES ($groupNo3,$MEMBER_NO,2);";

$products = $pdo->prepare($sql2);
$products->execute();


}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  echo $Errmsg;
}



?>


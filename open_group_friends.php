<?php

$Errmsg='';
$friendNo = isset($_GET["friendNo"]) ? $_GET["friendNo"] : "";
$memberNoNum1 = isset($_GET["memberNoNum1"]) ? $_GET["memberNoNum1"] : "";

try{
  require_once('./connectbook.php');
  //加入好友
$sql="insert into track_list (MEMBER_NO, FRIENDS_NO) VALUES ($memberNoNum1,$friendNo);";

$products = $pdo->prepare($sql);
$products->execute();


}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  echo $Errmsg;
}


?>


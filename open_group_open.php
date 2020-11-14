<?php

$groupNo = isset($_GET["groupNo"]) ? $_GET["groupNo"] : "";
$friendCheckboxVal=isset($_GET["friendCheckboxVal"]) ? $_GET["friendCheckboxVal"] : "";


try{
  require_once('connectRes.php');
  //陌生人加入


  for($i=0;$i<count($friendCheckboxVal);$i++){
    //開團加入邀請好友
      $sql1=" 
      insert into food_group_people( 
      GROUP_NO, 
      MEMBER_NO, 
      MEMBER_STATUS)
      VALUES ($groupNo,$friendCheckboxVal[$i],0);";
    
      $products = $pdo->prepare($sql1);
      $products->execute();
    }




}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  echo $Errmsg;
}



?>


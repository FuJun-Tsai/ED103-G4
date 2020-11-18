<?php
try{
session_start();
  require_once("../connectbook.php");
switch ($_POST["changefrom"]) {
    case 'add_stranger_block':
      $sql = "UPDATE food_group_people
      SET MEMBER_STATUS = 3
      WHERE MEMBER_NO = :MEMBER_NO
      AND GROUP_NO = :GROUP_NO";
      // var_dump($_POST["MEMBER_PSW"]);
      // die;
      $member = $pdo->prepare($sql);
      $member->bindValue(":GROUP_NO", $_POST["group_num"]);
      $member->bindValue(":MEMBER_NO", $_POST["num"]);
      $member->execute();
      break;
    case 'tab_notok':
      $sql = "UPDATE food_group_people
      SET MEMBER_STATUS = 3
      WHERE MEMBER_NO = :MEMBER_NO
      AND GROUP_NO = :GROUP_NO";
      
      $member = $pdo->prepare($sql);
      $member->bindValue(":GROUP_NO", $_POST["group_num"]);
      $member->bindValue(":MEMBER_NO", $_POST["num"]);
      $member->execute();
      break;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);//{"errorMsg":"......."}
}
?>

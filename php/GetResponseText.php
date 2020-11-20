<?php
try{
  require_once("../connectbook.php");
  $sql = "select * from member_management where MEMBER_ID=?";
  $member = $pdo->prepare($sql);
  $member->bindValue(1, $_GET["MEMBER_ID"]);
  // $member->bindValue(1, "Sara");
  $member->execute();

  if( $member->rowCount() !=0){ //此帳號已存在, 不可用
    echo "此帳號已存在, 不可用";
  }else{ //此帳號可使用
    echo "此帳號可使用";
  } 
}catch(PDOException $e){
  echo "error";
}
?>
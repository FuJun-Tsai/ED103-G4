<?php
session_start();
try{
  require_once("../connectbook.php");
  $sql = " SELECT MEMBER_ID, MEMBER_PSW, MEMBER_NAME, MEMBER_AGE, MEMBER_SEX, MEMBER_EMAIL, MEMBER_IMAGE, MEMBER_INTRODUCTION
  FROM `member_management` 
  WHERE MEMBER_ID =:MEMBER_ID";
  $member = $pdo->prepare($sql);
  $member->bindValue(":MEMBER_ID", $_SESSION["MEMBER_ID"]);
  $member->execute();
  if( $member->rowCount()==0){ //查無此人
	  echo "{}";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memRow = $member->fetch(PDO::FETCH_ASSOC);
    // //--------------將登入者的資料寫入session
    // session_start();
    //送出登入者的相關資料
    echo json_encode($memRow) ;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
   echo json_encode($error);//{"errorMsg":"......."}
}
?>


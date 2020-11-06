<?php
try{
  require_once("../connectRes.php");
  $sql = "select * from `member_management` where MEMBER_ID=:MEMBER_ID and MEMBER_PSW=:MEMBER_PSW"; 
  $member = $pdo->prepare($sql);
  $member->bindValue(":MEMBER_ID", $_POST["MEMBER_ID"]);
  $member->bindValue(":MEMBER_PSW", $_POST["MEMBER_PSW"]);
  $member->execute();
  if( $member->rowCount()==0){ //查無此人
	  echo "{}";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memRow = $member->fetch(PDO::FETCH_ASSOC);
    // //--------------將登入者的資料寫入session
    session_start();
    $_SESSION["MEMBER_NO"] = $memRow["MEMBER_NO"];
    $_SESSION["MEMBER_NAME"] = $memRow["MEMBER_NAME"];
    $_SESSION["MEMBER_AGE"] = $memRow["MEMBER_AGE"];
    $_SESSION["MEMBER_SEX"] = $memRow["MEMBER_SEX"];
    $_SESSION["MEMBER_ID"] = $memRow["MEMBER_ID"];
    $_SESSION["MEMBER_PSW"] = $memRow["MEMBER_PSW"];
    $_SESSION["MEMBER_EMAIL"] = $memRow["MEMBER_EMAIL"];
    $_SESSION["MEMBER_IMAGE"] = $memRow["MEMBER_IMAGE"];
    $_SESSION["MEMBER_INTRODUCTION"] = $memRow["MEMBER_INTRODUCTION"];
    $_SESSION["OPEN_GROUP_NUMBER"] = $memRow["OPEN_GROUP_NUMBER"];
    $_SESSION["JOIN_GROUP_NUMBER"] = $memRow["JOIN_GROUP_NUMBER"];
    $_SESSION["ARTICLE_PUSH_NUMBER"] = $memRow["ARTICLE_PUSH_NUMBER"];
    

    //送出登入者的相關資料
    echo json_encode($memRow) ;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
   echo json_encode($error);//{"errorMsg":"......."}
}
?>


<?php
session_start();
try{
  require_once("../connectRes.php");
  $sql = "UPDATE member_management
  SET MEMBER_NAME = :MEMBER_NAME,
      MEMBER_PSW = :MEMBER_PSW,
      MEMBER_EMAIL = :MEMBER_EMAIL,
      MEMBER_INTRODUCTION = :MEMBER_INTRODUCTION
  WHERE MEMBER_ID = :MEMBER_ID ";

  // var_dump($_POST["MEMBER_PSW"]);
  // die;
  
  $member = $pdo->prepare($sql);
  $member->bindValue(":MEMBER_ID", $_SESSION["MEMBER_ID"]);
  $member->bindValue(":MEMBER_PSW", $_POST["MEMBER_PSW"]);
  $member->bindValue(":MEMBER_NAME", $_POST["MEMBER_NAME"]);
  $member->bindValue(":MEMBER_EMAIL", $_POST["MEMBER_EMAIL"]);
  $member->bindValue(":MEMBER_INTRODUCTION", $_POST["MEMBER_INTRODUCTION"]);
  $member->execute();
  if( $member->rowCount()==0){ //查無此人
	  echo "{}";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memRow = $member->fetch(PDO::FETCH_ASSOC);
    // //--------------將登入者的資料寫入session
    $_SESSION["MEMBER_PSW"] = $memRow["MEMBER_PSW"];

    //送出登入者的相關資料
    echo json_encode($memRow) ;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);//{"errorMsg":"......."}
}
?>


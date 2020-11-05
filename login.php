<?php
try{
  require_once("connectRes.php");
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
    //--------------將登入者的資料寫入session
    session_start();
    $_SESSION["MEMBER_ID"] = $memRow["MEMBER_ID"];
    $_SESSION["MEMBER_NAME"] = $memRow["MEMBER_NAME"];
    $_SESSION["MEMBER_IMAGE"] = $memRow["MEMBER_IMAGE"];
    
    $result = array("MEMBER_ID"=>$memRow["MEMBER_ID"], "MEMBER_NAME"=>$memRow["MEMBER_NAME"], "MEMBER_IMAGE"=>$memRow["MEMBER_IMAGE"]);
  	$json = json_encode($result);

    //送出登入者的相關資料
    echo $json;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
   echo json_encode($error);//{"errorMsg":"......."}
}
?>


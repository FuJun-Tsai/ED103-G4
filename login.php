<?php
try{
  require_once("connectRes.php");
  $sql = "select * from `member_management` where MEMBER_ID=:MEMBER_ID and MEM_PSW=:MEM_PSW"; 
  $member = $pdo->prepare($sql);
  $member->bindValue(":MEMBER_ID", $_POST["MEMBER_ID"]);
  $member->bindValue(":MEM_PSW", $_POST["MEM_PSW"]);
  $member->execute();
  if( $member->rowCount()==0){ //查無此人
	  echo "{}";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memRow = $member->fetch(PDO::FETCH_ASSOC);
    //--------------將登入者的資料寫入session
    session_start();
    $_SESSION["MEMBER_ID"] = $memRow["MEMBER_ID"];

  
  	$json = json_encode("MEMBER_ID"=>$memRow["MEMBER_ID"]);

    //送出登入者的相關資料
    echo $json;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>


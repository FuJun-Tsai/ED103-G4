<?php
try{
  session_start();
  // require_once("connectBooks.php");
  require_once("connectbook.php");
  $sql = " SELECT AMD_ID ,AMD_PSD
            FROM amd
            WHERE AMD_ID=:MEMBER_ID
            AND AMD_PSD=:MEMBER_PSW";
  $member = $pdo->prepare($sql);
  $member->bindValue(":MEMBER_ID", $_REQUEST["user"]);
  $member->bindValue(":MEMBER_PSW", $_REQUEST["pass"]);
  $member->execute();
  if( $member->rowCount()==0){ //查無此人
	  echo "帳密錯誤";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memRow = $member->fetch(PDO::FETCH_ASSOC);
    // //--------------將登入者的資料寫入session
    $_SESSION["AMD_ID"] = $memRow["AMD_ID"];
    $_SESSION["AMD_PSW"] = $memRow["AMD_PSD"];
    // $_SESSION["MEMBER_NO"] = $memRow["MEMBER_NO"];
    // $_SESSION["MEMBER_NAME"] = $memRow["MEMBER_NAME"];

    //送出登入者的相關資料
    // print_r($memRow);
    echo json_encode($memRow) ;

    // header('location:back_end.html');

  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);//{"errorMsg":"......."}
}



?>
<?php
try{
  require_once("../../connectBooks.php");
  $sql = "select * from `member` where memId=:memId and memPsw=:memPsw"; 
  $member = $pdo->prepare($sql);
  $member->bindValue(":memId", $_POST["memId"]);
  $member->bindValue(":memPsw", $_POST["memPsw"]);
  // $member->bindValue(":memId", "Sara");
  // $member->bindValue(":memPsw", "111");
  $member->execute();
  if( $member->rowCount()==0){ //查無此人
	  echo "{}";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memRow = $member->fetch(PDO::FETCH_ASSOC);
    //--------------將登入者的資料寫入session
    session_start();
    $_SESSION["memNo"] = $memRow["no"];
    $_SESSION["memId"] = $memRow["memId"];
    $_SESSION["memName"] = $memRow["memName"];
    $_SESSION["email"] = $memRow["email"];
    $_SESSION["tel"] = $memRow["tel"];

  	$result = array("memId"=>$memRow["memId"], "memName"=>$memRow["memName"],
  					"email"=>$memRow["email"], "tel"=>$memRow["tel"]);
  	$json = json_encode($result);

    //送出登入者的相關資料
    echo $json;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>


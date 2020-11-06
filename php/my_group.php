<?php
try{
  require_once("../connectRes.php");
  $sql = "  SELECT *
            FROM `food_group`"; 
  $group = $pdo->prepare($sql);
  $group->execute();
  if( $group->rowCount()==0){ //查無此人
	  echo "{}";
  }else{ //登入成功
    //自資料庫中取回資料
  	$groupRow = $group->fetch(PDO::FETCH_ASSOC);
    // //--------------將登入者的資料寫入session
    session_start();
    // $_SESSION["GROUP_NO"] = $groupRow["GROUP_NO"];
    // $_SESSION["RES_NO"] = $groupRow["RES_NO"];
    // $_SESSION["MEMBER"] = $groupRow["MEMBER"];
    // $_SESSION["GROUP_NAME"] = $groupRow["GROUP_NAME"];
    // $_SESSION["START_TIME"] = $groupRow["START_TIME"];
    // $_SESSION["END_TIME"] = $groupRow["END_TIME"];
    // $_SESSION["MAX_NUMBER"] = $groupRow["MAX_NUMBER"];
    // $_SESSION["JOIN_NUMBER"] = $groupRow["JOIN_NUMBER"];
    // $_SESSION["MEAL_TIME"] = $groupRow["MEAL_TIME"];
    

    //送出登入者的相關資料
    echo json_encode($groupRow) ;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
   echo json_encode($error);//{"errorMsg":"......."}
}
?>


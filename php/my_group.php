<?php
try{
  require_once("../connectRes.php");
  $sql = "SELECT m.MEMBER_NAME'CHECK_NAME',m.MEMBER_IMAGE'CHECK_IMAGES',fgp.MEMBER_STATUS
          FROM `member_management` AS m JOIN `food_group_people` fgp ON (fgp.MEMBER_NO = m.MEMBER_NO)JOIN `food_group` AS f ON (fgp.GROUP_NO = f.GROUP_NO)
          WHERE f.MEMBER IN (SELECT f1.MEMBER
                            FROM `member_management` AS m1 JOIN `food_group` AS f1 ON (m1.MEMBER_NO = f1.MEMBER)
                            WHERE m1.MEMBER_ID =:MEMBER_ID 
                            AND m1.MEMBER_PSW =:MEMBER_PSW )
                            AND f.END_TIME >= DATE(NOW())";
  $group = $pdo->prepare($sql);
  $group->bindValue(":MEMBER_ID", $_POST["MEMBER_ID"]);
  $group->bindValue(":MEMBER_PSW", $_POST["MEMBER_PSW"]);
  $group->execute();
  // echo $sql;
  if( $group->rowCount()==0){ //查無此人
	  echo "{沒東西}";
  }else{ //登入成功
    //送出登入者的相關資料
  	$groupRow = $group->fetchAll(PDO::FETCH_ASSOC);
    session_start();
    //自資料庫中取回資料
    // //--------------將登入者的資料寫入session
    // $_SESSION["GROUP_NO"] = $groupRow["GROUP_NO"];
    // $_SESSION["RES_NO"] = $groupRow["RES_NO"];
    // $_SESSION["MEMBER"] = $groupRow["MEMBER"];
    // $_SESSION["GROUP_NAME"] = $groupRow["GROUP_NAME"];
    // $_SESSION["START_TIME"] = $groupRow["START_TIME"];
    // $_SESSION["END_TIME"] = $groupRow["END_TIME"];
    // $_SESSION["MAX_NUMBER"] = $groupRow["MAX_NUMBER"];
    // $_SESSION["JOIN_NUMBER"] = $groupRow["JOIN_NUMBER"];
    // $_SESSION["MEAL_TIME"] = $groupRow["MEAL_TIME"];
    echo json_encode($groupRow) ;
    

  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
   echo json_encode($error);//{"errorMsg":"......."}
}
?>


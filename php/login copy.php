<?php
try{
  require_once("../connectRes.php");
  $sql = " SELECT m.MEMBER_ID, m.MEMBER_PSW,m.MEMBER_NAME ,m.MEMBER_AGE, m.MEMBER_SEX, m.MEMBER_EMAIL, m.MEMBER_IMAGE, m.MEMBER_INTRODUCTION, f.GROUP_NO, f.GROUP_NAME, r.RES_NAME, rs.STYLE_NAME, rk.KIND_NAME, f.MEMBER'COMMANDER', f.JOIN_NUMBER, f.MEAL_TIME, r.RES_ADDRESS, r.RES_TEL, r.RES_BUS_HOURS, r.RES_IMAGE1, r.RES_IMAGE2, r.RES_IMAGE3, r.RES_IMAGE4
  FROM `member_management` m JOIN `food_group` f ON (m.MEMBER_NO = f.MEMBER)
                      JOIN `restaurant_management` r ON (r.RES_NO = f.RES_NO)
                      JOIN `restaurant_style` rs ON (rs.STYLE_NO = r.RES_STYLE)
                      JOIN `restaurant_kind` rk ON (rk.KIND_NO = r.RES_KIND)
  WHERE f.END_TIME >= DATE(NOW())
  AND MEMBER_ID=:MEMBER_ID
  AND MEMBER_PSW=:MEMBER_PSW";
  $member = $pdo->prepare($sql);
  $member->bindValue(":MEMBER_ID", $_POST["MEMBER_ID"]);
  $member->bindValue(":MEMBER_PSW", $_POST["MEMBER_PSW"]);
  $member->execute();
  if( $member->rowCount()==0){ //查無此人
	  echo "{}";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memRow = $member->fetch(PDO::FETCH_ASSOC);
    session_start();
    // //--------------將登入者的資料寫入session
    $_SESSION["MEMBER_ID"] = $memRow["MEMBER_ID"];
    $_SESSION["MEMBER_PSW"] = $memRow["MEMBER_PSW"];
    $_SESSION["MEMBER_NAME"] = $memRow["MEMBER_NAME"];
    $_SESSION["MEMBER_AGE"] = $memRow["MEMBER_AGE"];
    $_SESSION["MEMBER_SEX"] = $memRow["MEMBER_SEX"];
    $_SESSION["MEMBER_EMAIL"] = $memRow["MEMBER_EMAIL"];
    $_SESSION["MEMBER_IMAGE"] = $memRow["MEMBER_IMAGE"];
    $_SESSION["MEMBER_INTRODUCTION"] = $memRow["MEMBER_INTRODUCTION"];
    // $_SESSION["GROUP_NO"] = $memRow["GROUP_NO"];
    // $_SESSION["GROUP_NAME"] = $memRow["GROUP_NAME"];
    // $_SESSION["RES_NAME"] = $memRow["RES_NAME"];
    // $_SESSION["STYLE_NAME"] = $memRow["STYLE_NAME"];
    // $_SESSION["KIND_NAME"] = $memRow["KIND_NAME"];
    // $_SESSION["COMMANDER"] = $memRow["COMMANDER"];
    // $_SESSION["JOIN_NUMBER"] = $memRow["JOIN_NUMBER"];
    // $_SESSION["MEAL_TIME"] = $memRow["MEAL_TIME"];
    // $_SESSION["RES_ADDRESS"] = $memRow["RES_ADDRESS"];
    // $_SESSION["RES_TEL"] = $memRow["RES_TEL"];
    // $_SESSION["RES_BUS_HOURS"] = $memRow["RES_BUS_HOURS"];
    // $_SESSION["MAIN_IMG"] = $memRow["RES_IMAGE1"];
    // $_SESSION["RES_IMAGE1"] = $memRow["RES_IMAGE1"];
    // $_SESSION["RES_IMAGE2"] = $memRow["RES_IMAGE2"];
    // $_SESSION["RES_IMAGE3"] = $memRow["RES_IMAGE3"];
    // $_SESSION["RES_IMAGE4"] = $memRow["RES_IMAGE4"];
    //送出登入者的相關資料
    echo json_encode($memRow) ;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);//{"errorMsg":"......."}
}
?>


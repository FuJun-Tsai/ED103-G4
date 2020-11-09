<?php
session_start();
try{
  require_once("../connectRes.php");
  $sql = " SELECT m.MEMBER_NAME, m.MEMBER_AGE, m.MEMBER_SEX, m.MEMBER_EMAIL, m.MEMBER_IMAGE, m.MEMBER_INTRODUCTION, f.GROUP_NO, f.GROUP_NAME, r.RES_NAME, rs.STYLE_NAME, rk.KIND_NAME, m.MEMBER_NAME, f.JOIN_NUMBER, f.MEAL_TIME, r.RES_ADDRESS, r.RES_TEL, r.RES_BUS_HOURS, r.RES_IMAGE1, r.RES_IMAGE2, r.RES_IMAGE3, r.RES_IMAGE4
  FROM `food_group` f JOIN `member_management` m ON (m.MEMBER_NO = f.MEMBER)
                      JOIN `restaurant_management` r ON (r.RES_NO = f.RES_NO)
                      JOIN `restaurant_style` rs ON (rs.STYLE_NO = r.RES_STYLE)
                      JOIN `restaurant_kind` rk ON (rk.KIND_NO = r.RES_KIND)
  WHERE f.END_TIME >= DATE(NOW())";
  $member = $pdo->prepare($sql);
  $member->execute();
  if( $member->rowCount()==0){ //查無此人
	  echo "{}";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memRow = $member->fetch(PDO::FETCH_ASSOC);
    // //--------------將登入者的資料寫入session
    // session_start();
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


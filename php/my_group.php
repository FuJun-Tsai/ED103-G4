<?php
session_start();
try{
  require_once("../connectbook.php");
  $sql = "SELECT m.MEMBER_NAME'CHECK_NAME',m.MEMBER_IMAGE'CHECK_IMAGES',fgp.MEMBER_STATUS,fgp.MEMBER_NO,fgp.GROUP_NO
          FROM `member_management` AS m JOIN `food_group_people` fgp ON (fgp.MEMBER_NO = m.MEMBER_NO)
                                        JOIN `food_group` AS f ON (fgp.GROUP_NO = f.GROUP_NO)
          WHERE f.MEMBER IN (SELECT f1.MEMBER
                            FROM `member_management` AS m1 JOIN `food_group` AS f1 ON (m1.MEMBER_NO = f1.MEMBER)
                            WHERE m1.MEMBER_ID =:MEMBER_ID )
          AND f.END_TIME >= DATE(NOW())
          AND fgp.MEMBER_STATUS = 2";
  $group = $pdo->prepare($sql);
  $group->bindValue(":MEMBER_ID",$_SESSION["MEMBER_ID"]);
  $group->execute();
  // echo $sql;
  if( $group->rowCount()==0){ //查無此人
	  echo "{}";
  }else{ //登入成功
    //送出登入者的相關資料
  	$groupRow = $group->fetchAll(PDO::FETCH_ASSOC);
    //自資料庫中取回資料
    // //--------------將登入者的資料寫入session
    echo json_encode($groupRow) ;
    

  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
   echo json_encode($error);//{"errorMsg":"......."}
}
?>


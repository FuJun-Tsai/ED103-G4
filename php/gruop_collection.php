<?php
session_start();
try{
  require_once("../connectRes.php");
  $sql = " SELECT f.GROUP_NAME, m.MEMBER_IMAGE, m.MEMBER_NAME, Date_format(f.START_TIME,'%m/%d')'START_DATE', fgc.MEMBER_NO 
          FROM food_group f JOIN `member_management` m ON (f.MEMBER = m.MEMBER_NO) 
                            JOIN `food_group_collection` fgc ON (f.GROUP_NO = fgc.GROUP_NO) 
          WHERE fgc.MEMBER_NO IN (SELECT fgc1.MEMBER_NO 
                            FROM `food_group_collection` fgc1 JOIN `member_management` m1 ON (fgc1.MEMBER_NO = m1.MEMBER_NO) 
                            WHERE m1.MEMBER_ID =:MEMBER_ID AND m1.MEMBER_PSW =:MEMBER_PSW  )";
  $gc = $pdo->prepare($sql);
  $gc->bindValue(":MEMBER_ID", $_POST["MEMBER_ID"]);
  $gc->bindValue(":MEMBER_PSW", $_POST["MEMBER_PSW"]);
  $gc->execute();
  if( $gc->rowCount()==0){ 
	  echo "{}";
  }else{ 
  	$gcRow = $gc->fetchALL(PDO::FETCH_ASSOC);
    echo json_encode($gcRow) ;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
   echo json_encode($error);//{"errorMsg":"......."}
}
?>

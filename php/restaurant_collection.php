<?php
session_start();
try{
  require_once("../connectbook.php");
  $sql = " SELECT r.RES_NAME, r.RES_IMAGE1, r.RES_ADDRESS, r.RES_TEL, r.RES_HOURS, rc.RES_NO
  FROM `restaurant_management` r JOIN `restaurant_collection` rc ON (r.RES_NO = rc.RES_NO) 
                                JOIN `member_management` m ON (rc.MEMBER_NO = m.MEMBER_NO) 
  WHERE m.MEMBER_ID =:MEMBER_ID";
  $gc = $pdo->prepare($sql);
  $gc->bindValue(":MEMBER_ID", $_SESSION["MEMBER_ID"]);
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

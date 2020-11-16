<?php
session_start();
try{
  require_once("../connectbook.php");
  $sql = " SELECT m.MEMBER_IMAGE, m.MEMBER_NAME, tl.MEMBER_NO, tl.FRIENDS_NO
  FROM `member_management` m JOIN `track_list` tl ON (m.MEMBER_NO = tl.FRIENDS_NO)
  WHERE tl.MEMBER_NO IN (SELECT tl1.MEMBER_NO
                        FROM `track_list` tl1 JOIN member_management m1 ON(m1.MEMBER_NO = tl1.MEMBER_NO)
                        WHERE m1.MEMBER_ID =:MEMBER_ID)";
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

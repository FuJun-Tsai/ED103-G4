<?php
session_start();
try{
  require_once("../connectRes.php");
  $sql = " SELECT a.ARTICLE_TITLE, a.ARTICLE_IMAGE1, m.MEMBER_NAME,  Date_format(a.ARTICLE_DATE,'%m/%d')'DATE', a.ARTICLE_LIKE
  FROM `article_sharing` a JOIN `article_collection` ac ON (a.ARTICLE_NO = ac.ARTICLE_NO) 
                            JOIN `member_management` m ON (a.MEMBER_NO = m.MEMBER_NO) 
  WHERE m.MEMBER_NO =:MEMBER_NO
  ORDER BY Date_format(a.ARTICLE_DATE,'%m/%d') DESC";
  $gc = $pdo->prepare($sql);
  $gc->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
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

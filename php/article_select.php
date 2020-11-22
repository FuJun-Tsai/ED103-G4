<?php
session_start();
try{
  require_once("../connectbook.php");
  $sql1 = " SELECT a.ARTICLE_TITLE, a.ARTICLE_IMAGE1, m.MEMBER_NAME,  Date_format(a.ARTICLE_DATE,'%m/%d')'DATE', a.ARTICLE_LIKE, m.MEMBER_NO, a.ARTICLE_NO
  FROM `article_sharing` a  JOIN `member_management` m ON (a.MEMBER_NO = m.MEMBER_NO) 
  WHERE m.MEMBER_ID =:MEMBER_ID
  ORDER BY Date_format(a.ARTICLE_DATE,'%m/%d') DESC";
  $date = $pdo->prepare($sql1);
  $date->bindValue(":MEMBER_ID", $_SESSION["MEMBER_ID"]);
  $date->execute();
  if( $date->rowCount()==0){ 
      echo "{}";
    }else{ 
      $dateRow = $date->fetchALL(PDO::FETCH_ASSOC);
      echo json_encode($dateRow) ;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);//{"errorMsg":"......."}
}
?>

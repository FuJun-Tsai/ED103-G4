<?php
session_start();
try{
  require_once("../connectbook.php");
  $sql2 = " SELECT a.ARTICLE_TITLE, a.ARTICLE_IMAGE1, m.MEMBER_NAME,  Date_format(a.ARTICLE_DATE,'%m/%d')'DATE', a.MESSAGE_TOTAL, a.ARTICLE_NO
  FROM `article_sharing` a JOIN `member_management` m ON (a.MEMBER_NO = m.MEMBER_NO) 
  WHERE m.MEMBER_ID =:MEMBER_ID
  ORDER BY a.MESSAGE_TOTAL DESC";
  $mes = $pdo->prepare($sql2);
  $mes->bindValue(":MEMBER_ID", $_SESSION["MEMBER_ID"]);
  $mes->execute();
  if( $mes->rowCount()==0){ 
    echo "{}";
  }else{ 
    $mesRow = $mes->fetchALL(PDO::FETCH_ASSOC);
    echo json_encode($mesRow) ;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);//{"errorMsg":"......."}
}
?>

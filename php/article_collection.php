<?php
session_start();
try{
  require_once("../connectbook.php");
  $sql = " SELECT a.ARTICLE_TITLE, a.ARTICLE_IMAGE1, m.MEMBER_NAME,  Date_format(a.ARTICLE_DATE,'%m/%d')'DATE', a.ARTICLE_LIKE, ac.ARTICLE_NO
  ,(SELECT COUNT(*) FROM article_collection WHERE article_collection.ARTICLE_NO = A.ARTICLE_NO) as ac
  FROM `article_sharing` a JOIN `article_collection` ac ON (a.ARTICLE_NO = ac.ARTICLE_NO) 
                            JOIN `member_management` m ON (a.MEMBER_NO = m.MEMBER_NO) 
  WHERE ac.MEMBER_NO IN (SELECT ac1.MEMBER_NO
                    FROM `article_collection` ac1 JOIN `member_management` m1 ON (ac1.MEMBER_NO = m1.MEMBER_NO)
                    WHERE m1.MEMBER_ID =:MEMBER_ID) ";
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

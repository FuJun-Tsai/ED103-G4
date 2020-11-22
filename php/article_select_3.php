<?
session_start();
try{
  require_once("../connectbook.php");
  $sql3 = " SELECT a.ARTICLE_TITLE, a.ARTICLE_IMAGE1, m.MEMBER_NAME,  Date_format(a.ARTICLE_DATE,'%m/%d')'DATE', a.ARTICLE_LIKE, a.ARTICLE_NO
  FROM `article_sharing` a JOIN `member_management` m ON (a.MEMBER_NO = m.MEMBER_NO) 
  WHERE m.MEMBER_ID =:MEMBER_ID
  ORDER BY a.ARTICLE_LIKE DESC";
  $like = $pdo->prepare($sql3);
  $like->bindValue(":MEMBER_ID", $_SESSION["MEMBER_ID"]);
  $like->execute();
  if( $like->rowCount()==0){ 
    echo "{}";
  }else{ 
    $likeRow = $like->fetchALL(PDO::FETCH_ASSOC);
    echo json_encode($likeRow) ;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);//{"errorMsg":"......."}
}
?>
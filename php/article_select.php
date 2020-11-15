<?php
try{
session_start();
require_once("../connectRes.php");
  switch ($_POST["tab"]) {
    case 'tab-date':
      $sql1 = " SELECT a.ARTICLE_TITLE, a.ARTICLE_IMAGE1, m.MEMBER_NAME,  Date_format(a.ARTICLE_DATE,'%m/%d')'DATE', a.ARTICLE_LIKE
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
      break;

    case 'tab_leave_a_comment':
      $sql2 = " SELECT a.ARTICLE_TITLE, a.ARTICLE_IMAGE1, m.MEMBER_NAME,  Date_format(a.ARTICLE_DATE,'%m/%d')'DATE', a.ARTICLE_LIKE
      FROM `article_sharing` a JOIN `article_collection` ac ON (a.ARTICLE_NO = ac.ARTICLE_NO) 
                                JOIN `member_management` m ON (a.MEMBER_NO = m.MEMBER_NO) 
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
      break;

    case 'tab_like':
      $sql3 = " SELECT a.ARTICLE_TITLE, a.ARTICLE_IMAGE1, m.MEMBER_NAME,  Date_format(a.ARTICLE_DATE,'%m/%d')'DATE', a.ARTICLE_LIKE
      FROM `article_sharing` a JOIN `article_collection` ac ON (a.ARTICLE_NO = ac.ARTICLE_NO) 
                                JOIN `member_management` m ON (a.MEMBER_NO = m.MEMBER_NO) 
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
      break;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);//{"errorMsg":"......."}
}
?>

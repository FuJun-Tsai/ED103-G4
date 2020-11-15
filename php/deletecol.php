<?php
  try{
    session_start();
    require_once("../connectRes.php");

    switch($_POST["collect"]){
      case 'food_group_collection':
        $sql1 = " DELETE 
        FROM food_group_collection
        WHERE MEMBER_NO=:MEMBER_NO
        AND GROUP_NO=:GROUP_NO";
        $member = $pdo->prepare($sql1);
        $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
        $member->bindValue(":GROUP_NO", $_POST["num"]);
        // $member->bindValue(":collect", $_POST["collect"]);
        $member->execute();
        break;
      case 'restaurant_collection':
        $sql2 = " DELETE 
        FROM restaurant_collection
        WHERE MEMBER_NO=:MEMBER_NO
        AND RES_NO=:RES_NO";
        $member = $pdo->prepare($sql2);
        $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
        $member->bindValue(":RES_NO", $_POST["num"]);
        // $member->bindValue(":restaurant_collection", $_POST["collect"]);
        $member->execute();
        break;
      case 'article_collection':
        $sql3 = " DELETE 
        FROM article_collection
        WHERE MEMBER_NO=:MEMBER_NO
        AND ARTICLE_NO=:ARTICLE_NO";
        $member = $pdo->prepare($sql3);
        $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
        // $member->bindValue(":article_collection", $_POST["collect"]);
        $member->bindValue(":ARTICLE_NO", $_POST["num"]);
        $member->execute();
        break;
      case 'article_collection':
        $sql3 = " DELETE 
        FROM article_collection
        WHERE MEMBER_NO=:MEMBER_NO
        AND ARTICLE_NO=:ARTICLE_NO";
        $member = $pdo->prepare($sql3);
        $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
        // $member->bindValue(":article_collection", $_POST["collect"]);
        $member->bindValue(":ARTICLE_NO", $_POST["num"]);
        $member->execute();
        break;
      case 'article_collection':
        $sql3 = " DELETE 
        FROM article_collection
        WHERE MEMBER_NO=:MEMBER_NO
        AND ARTICLE_NO=:ARTICLE_NO";
        $member = $pdo->prepare($sql3);
        $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
        // $member->bindValue(":article_collection", $_POST["collect"]);
        $member->bindValue(":ARTICLE_NO", $_POST["num"]);
        $member->execute();
        break;
      case 'article_collection':
        $sql3 = " DELETE 
        FROM article_collection
        WHERE MEMBER_NO=:MEMBER_NO
        AND ARTICLE_NO=:ARTICLE_NO";
        $member = $pdo->prepare($sql3);
        $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
        // $member->bindValue(":article_collection", $_POST["collect"]);
        $member->bindValue(":ARTICLE_NO", $_POST["num"]);
        $member->execute();
        break;
    }

}catch(PDOException $e){
    $error = array("errorMsg"=>$e->getMessage());
    echo json_encode($error);//{"errorMsg":"......."}
}
?>

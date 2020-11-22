<?php
  try{
    session_start();
    require_once("../connectbook.php");

    switch($_POST["deletefrom"]){
      case 'food_group_collection':
        $sql1 = " DELETE 
        FROM food_group_collection
        WHERE MEMBER_NO=:MEMBER_NO
        AND GROUP_NO=:GROUP_NO";
        $member = $pdo->prepare($sql1);
        $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
        $member->bindValue(":GROUP_NO", $_POST["num"]);
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
        $member->execute();
        break;
      case 'article_collection':
        $sql3 = " DELETE 
        FROM article_collection
        WHERE MEMBER_NO=:MEMBER_NO
        AND ARTICLE_NO=:ARTICLE_NO";
        $member = $pdo->prepare($sql3);
        $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
        $member->bindValue(":ARTICLE_NO", $_POST["num"]);
        $member->execute();
        break;
      case 'add_stranger_block':
        $sql4 = " DELETE 
        FROM food_group_people
        WHERE MEMBER_NO=:MEMBER_NO
        AND GROUP_NO=:GROUP_NO";
        $member = $pdo->prepare($sql4);
        $member->bindValue(":GROUP_NO", $_POST["group_num"]);
        $member->bindValue(":MEMBER_NO", $_POST["num"]);
        $member->execute();
        break;
      case 'tab_notok':
        $sql5 = " DELETE 
        FROM food_group_people
        WHERE MEMBER_NO=:MEMBER_NO
        AND GROUP_NO=:GROUP_NO";
        $member = $pdo->prepare($sql5);
        $member->bindValue(":GROUP_NO", $_POST["group_num"]);
        $member->bindValue(":MEMBER_NO", $_POST["num"]);
        $member->execute();
        break;
      case 'tab_date':
        $sql4 =" DELETE FROM `article_message` 
        WHERE ARTICLE_NO= :ARTICLE_NO";
        $member = $pdo->prepare($sql4);
        // $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
        $member->bindValue(":ARTICLE_NO", $_POST["num"]);
        $member->execute();
        $sql5 =" DELETE FROM `article_collection` 
        WHERE ARTICLE_NO= :ARTICLE_NO";
        $member = $pdo->prepare($sql5);
        // $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
        $member->bindValue(":ARTICLE_NO", $_POST["num"]);
        $member->execute();
        $sql6 = " DELETE 
        FROM article_sharing
        WHERE MEMBER_NO=:MEMBER_NO
        AND ARTICLE_NO=:ARTICLE_NO";
        $member1 = $pdo->prepare($sql6);
        $member1->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
        $member1->bindValue(":ARTICLE_NO", $_POST["num"]);
        $member1->execute();
        break;
      case 'fd_ul':
        $sql6 = " DELETE 
        FROM track_list
        WHERE MEMBER_NO=:MEMBER_NO
        AND FRIENDS_NO=:FRIENDS_NO";
        $member = $pdo->prepare($sql6);
        $member->bindValue(":FRIENDS_NO", $_POST["num"]);
        $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
        $member->execute();
        break;
    }

}catch(PDOException $e){
    $error = array("errorMsg"=>$e->getMessage());
    echo json_encode($error);//{"errorMsg":"......."}
}
?>

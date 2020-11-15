<?php
if ($_POST["collect"] = 'food_group_collection'){
  try{
    session_start();
    require_once("../connectRes.php");
    $sql = " DELETE 
    FROM `food_group_collection=:food_group_collection` 
    WHERE MEMBER_NO=:MEMBER_NO
    AND GROUP_NO=:GROUP_NO";
    $member = $pdo->prepare($sql);
    $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
    $member->bindValue(":GROUP_NO", $_POST["num"]);
    $member->bindValue(":food_group_collection", $_POST["collect"]);
    $member->execute();
  }catch(PDOException $e){
    $error = array("errorMsg"=>$e->getMessage());
    echo json_encode($error);//{"errorMsg":"......."}
  }
}elseif($_POST["collect"] = 'restaurant_collection'){
  try{
    session_start();
    require_once("../connectRes.php");
    $sql = " DELETE 
    FROM `restaurant_collection=:restaurant_collection` 
    WHERE MEMBER_NO=:MEMBER_NO
    AND RES_NO=:RES_NO";
    $member = $pdo->prepare($sql);
    $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
    $member->bindValue(":RES_NO", $_POST["num"]);
    $member->bindValue(":restaurant_collection", $_POST["collect"]);
    $member->execute();
  }catch(PDOException $e){
    $error = array("errorMsg"=>$e->getMessage());
    echo json_encode($error);//{"errorMsg":"......."}
  }
}elseif($_POST["collect"] = 'article_collection'){
  try{
    session_start();
    require_once("../connectRes.php");
    $sql = " DELETE 
    FROM `article_collection=:article_collection` 
    WHERE MEMBER_NO=:MEMBER_NO
    AND ARTICLE_NO=:ARTICLE_NO";
    $member = $pdo->prepare($sql);
    $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
    $member->bindValue(":article_collection", $_POST["collect"]);
    $member->bindValue(":ARTICLE_NO", $_POST["no"]);
    $member->execute();
  }catch(PDOException $e){
    $error = array("errorMsg"=>$e->getMessage());
    echo json_encode($error);//{"errorMsg":"......."}
  }
}
?>

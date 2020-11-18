<?
try {
  session_start();
  require_once("../connectbook.php");
  $sql = "UPDATE `food_group`
  SET `JOIN_NUMBER` = :JOIN_NUMBER+1
  WHERE `MEMBER` = :MEMBER_NO
  AND  `GROUP_NO` = :GROUP_NO";
  $member = $pdo->prepare($sql);
  $member->bindValue(":JOIN_NUMBER", $_POST["group_people"]);
  $member->bindValue(":GROUP_NO", $_POST["group_num"]);
  $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
  $member->execute();
} catch (PDOException $e) {
  $error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);
}

?>
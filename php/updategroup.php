<?
try {
  session_start();
  require_once("../connectbook.php");
  // var_dump($_POST["group_num"]);
  // die;
  $sql = "UPDATE `food_group`
  SET `JOIN_NUMBER` = :JOIN_NUMBER
  WHERE `MEMBER` = :MEMBER_NO
  AND  `GROUP_NO` = :GROUP_NO";
  $member = $pdo->prepare($sql);
  $member->bindValue(":JOIN_NUMBER", (int)$_POST["group_people"] + 1);
  $member->bindValue(":GROUP_NO", (int)$_POST["group_num"]);
  $member->bindValue(":MEMBER_NO", $_SESSION["MEMBER_NO"]);
  $member->execute();
echo "修改完成";

} catch (PDOException $e) {
  $error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);
}

?>
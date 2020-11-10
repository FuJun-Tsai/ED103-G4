<?php 
try{
	require_once("../connectRes.php");
	$sql = "SELECT MEMBER_ID ,MEMBER_PSW ,MEMBER_IMAGE
	FROM `member_management`";
	$member = $pdo->prepare($sql);
  // $member->bindValue(":MEMBER_ID", $_POST["MEMBER_ID"]);
	// $member->bindValue(":MEMBER_ID", $_POST["MEMBER_PSW"]);
	$member->execute();
	if(isset($_SESSION["MEMBER_ID"]) === true){
		$_SESSION["MEMBER_ID"] = $memRow["MEMBER_ID"];
		$_SESSION["MEMBER_PSW"] = $memRow["MEMBER_PSW"];
    $_SESSION["MEMBER_IMAGE"] = $memRow["MEMBER_IMAGE"];
		$result = array(
			"MEMBER_ID"=>$_SESSION["MEMBER_ID"], 
			"MEMBER_PSW"=>$_SESSION["MEMBER_PSW"], 
			"MEMBER_IMAGE"=>$_SESSION["MEMBER_IMAGE"], 
		);
		$json = json_encode($result);
		echo $json;
	}else{
		echo "{找不到memberinfo}";
	}
}catch(PDOException $e){
		$error = array("errorMsg"=>$e->getMessage());
		echo json_encode($error);
}
?>
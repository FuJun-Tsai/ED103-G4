<?php 
try{
	require_once("../connectRes.php");
	$sql = "SELECT MEMBER_ID ,MEMBER_PSW, MEMBER_NAME, MEMBER_AGE, MEMBER_SEX, MEMBER_EMAIL, MEMBER_IMAGE, MEMBER_INTRODUCTION
	FROM `member_management`";
	$member = $pdo->prepare($sql);
  // $member->bindValue(":MEMBER_ID", $_POST["MEMBER_ID"]);
	// $member->bindValue(":MEMBER_ID", $_POST["MEMBER_PSW"]);
	$member->execute();
	if(isset($_SESSION["MEMBER_ID"]) === true){
		$_SESSION["MEMBER_ID"] = $memRow["MEMBER_ID"];
		$_SESSION["MEMBER_PSW"] = $memRow["MEMBER_PSW"];
    $_SESSION["MEMBER_NAME"] = $memRow["MEMBER_NAME"];
    $_SESSION["MEMBER_AGE"] = $memRow["MEMBER_AGE"];
    $_SESSION["MEMBER_SEX"] = $memRow["MEMBER_SEX"];
    $_SESSION["MEMBER_EMAIL"] = $memRow["MEMBER_EMAIL"];
    $_SESSION["MEMBER_IMAGE"] = $memRow["MEMBER_IMAGE"];
    $_SESSION["MEMBER_INTRODUCTION"] = $memRow["MEMBER_INTRODUCTION"];
		$result = array(
			"MEMBER_ID"=>$_SESSION["MEMBER_ID"], 
			"MEMBER_PSW"=>$_SESSION["MEMBER_PSW"], 
			"MEMBER_NAME"=>$_SESSION["MEMBER_NAME"], 
			"MEMBER_AGE"=>$_SESSION["MEMBER_AGE"], 
			"MEMBER_SEX"=>$_SESSION["MEMBER_SEX"], 
			"MEMBER_EMAIL"=>$_SESSION["MEMBER_EMAIL"], 
			"MEMBER_IMAGE"=>$_SESSION["MEMBER_IMAGE"], 
			"MEMBER_INTRODUCTION"=>$_SESSION["MEMBER_INTRODUCTION"]
		);
		$json = json_encode($result);
		echo $json;
	}else{
		echo "{}";
	}
}catch(PDOException $e){
		$error = array("errorMsg"=>$e->getMessage());
		echo json_encode($error);//{"errorMsg":"......."}
}
?>
<?php
session_start();
if(isset($_SESSION["MEMBER_ID"]) === true){
	$result = array(
		"MEMBER_ID"=>$_SESSION["MEMBER_ID"], 
		"MEMBER_PSW"=>$_SESSION["MEMBER_PSW"], 
		"MEMBER_NAME"=>$_SESSION["MEMBER_NAME"], 
		"MEMBER_AGE"=>$_SESSION["MEMBER_AGE"], 
		"MEMBER_SEX"=>$_SESSION["MEMBER_SEX"], 
		"MEMBER_EMAIL"=>$_SESSION["MEMBER_EMAIL"], 
		"MEMBER_IMAGE"=>$_SESSION["MEMBER_IMAGE"], 
		"MEMBER_INTRODUCTION"=>$_SESSION["MEMBER_INTRODUCTION"], 
		"GROUP_NO"=>$_SESSION["GROUP_NO"], 
		"GROUP_NAME"=>$_SESSION["GROUP_NAME"], 
		"RES_NAME"=>$_SESSION["RES_NAME"], 
		"STYLE_NAME"=>$_SESSION["STYLE_NAME"], 
		"KIND_NAME"=>$_SESSION["KIND_NAME"], 
		"COMMANDER"=>$_SESSION["COMMANDER"], 
		"JOIN_NUMBER"=>$_SESSION["JOIN_NUMBER"], 
		"MEAL_TIME"=>$_SESSION["MEAL_TIME"], 
		"RES_ADDRESS"=>$_SESSION["RES_ADDRESS"], 
		"RES_TEL"=>$_SESSION["RES_TEL"], 
		"RES_BUS_HOURS"=>$_SESSION["RES_BUS_HOURS"], 
		"MAIN_IMG"=>$_SESSION["RES_IMAGE1"], 
		"RES_IMAGE1"=>$_SESSION["RES_IMAGE1"], 
		"RES_IMAGE2"=>$_SESSION["RES_IMAGE2"], 
		"RES_IMAGE3"=>$_SESSION["RES_IMAGE3"], 
		"RES_IMAGE4"=>$_SESSION["RES_IMAGE4"], 

	);
	$json = json_encode($result);
	echo $json;
}else{
	echo "{}";
}
?>
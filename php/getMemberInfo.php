<?php 
session_start();
if(isset($_SESSION["MEMBER_ID"]) === true){
	$result = array(
		// "MEMBER_NO"=>$_SESSION["MEMBER_NO"], 
		// "MEMBER_NAME"=>$_SESSION["MEMBER_NAME"], 
		// "MEMBER_AGE"=>$_SESSION["MEMBER_AGE"], 
		// "MEMBER_SEX"=>$_SESSION["MEMBER_SEX"], 
		// "MEMBER_ID"=>$_SESSION["MEMBER_ID"], 
		// "MEMBER_PSW"=>$_SESSION["MEMBER_PSW"], 
		// "MEMBER_EMAIL"=>$_SESSION["MEMBER_EMAIL"], 
		"MEMBER_IMAGE"=>$_SESSION["MEMBER_IMAGE"], 
		// "MEMBER_INTRODUCTION"=>$_SESSION["MEMBER_INTRODUCTION"], 
		// "OPEN_GROUP_NUMBER"=>$_SESSION["OPEN_GROUP_NUMBER"], 
		// "JOIN_GROUP_NUMBER"=>$_SESSION["JOIN_GROUP_NUMBER"],
		// "ARTICLE_PUSH_NUMBER"=>$_SESSION["ARTICLE_PUSH_NUMBER"],
	);
	$json = json_encode($result);
	echo json_encode($result);
}else{
	echo "{}";
}
?>
<?php 
session_start();
if(isset($_SESSION["MEMBER_ID"]) === true){

	$result = array(
		"MEMBER_ID"=>$_SESSION["MEMBER_ID"], 
		"MEMBER_IMAGE"=>$_SESSION["MEMBER_IMAGE"], 
	);
	echo json_encode($result);
}else{
	echo "{}";
}
?>
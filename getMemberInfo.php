<?php 
session_start();
if(isset($_SESSION["MEMBER_PSW"]) === true){
	$result = array("MEMBER_ID"=>$memRow["MEMBER_ID"], "MEMBER_NAME"=>$memRow["MEMBER_NAME"]);
	$json = json_encode($result);
}else{
	echo "{}";
}
?>
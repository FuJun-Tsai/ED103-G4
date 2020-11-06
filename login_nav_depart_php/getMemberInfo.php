<?php 
session_start();
if(isset($_SESSION["MEMBER_ID"]) === true){
	$result = array("MEMBER_ID"=>$memRow["MEMBER_ID"], "MEMBER_NAME"=>$memRow["MEMBER_NAME"]);
	$json = json_encode($result);

	//送出登入者的相關資料
	echo $json;
}else{
	echo "{}";
}
?>
<?php 
session_start();
if(isset($_SESSION["memId"]) === true){
	$result = array("memId"=>$_SESSION["memId"], "memName"=>$_SESSION["memName"],
  					"email"=>$_SESSION["email"], "tel"=>$_SESSION["tel"]);
	echo json_encode($result);
}else{
	echo "{}";
}
?>
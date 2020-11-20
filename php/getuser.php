<?php
$Errmsg = '';
session_start();
try{
    if(isset($_SESSION["MEMBER_ID"])===true){
        $user = array(
            "ID"=>$_SESSION["MEMBER_ID"],
            "IMG"=>$_SESSION["MEMBER_IMAGE"],
            "FRIENDS_MASTER_NO"=>$_SESSION["MEMBER_NO"],
        );
        echo json_encode($user);
    };


}catch(PDOException $e){
    $Errmsg.= $e->getLine() . '<br>' . $e->getMessage();
    echo $Errmsg;
}


?>
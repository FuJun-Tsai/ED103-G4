<?php
$Errmsg = '';
session_start();
$RES = $_REQUEST['RES'];
$member = $_SESSION['MEMBER_NO'];
echo $_REQUEST['do'];
try{
<<<<<<< HEAD
    require_once('connectbook.php');
=======
    require_once('connetbook.php');
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
    if($_REQUEST['do']=='true'){
        $sql = "INSERT restaurant_collection(MEMBER_NO,RES_NO)
                VALUES($member,$RES)";
    }else{
        $sql = "DELETE FROM restaurant_collection
                WHERE
                MEMBER_NO = $member AND 
                RES_NO = $RES ;";
    }
    $data = $pdo->prepare($sql);
    $data-> execute();

}catch(PDOException $e){
    $Errmsg.= $e->getLine() . '<br>' . $e->getMessage();
    echo $Errmsg;
}



?>
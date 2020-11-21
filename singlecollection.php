<?php
$Errmsg = '';
session_start();
$member = $_SESSION['MEMBER_NO'];
$res = $_REQUEST['RES'];
try{
<<<<<<< HEAD
    require_once('connectbook.php');
=======
    require_once('connetbook.php');
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
    $sql = "SELECT * FROM `restaurant_collection`
            WHERE 
                MEMBER_NO = $member AND 
                RES_NO = $res;";

    $data = $pdo->prepare($sql);
    $data-> execute();

    if($data->rowCount()==0){
        echo '資料有誤';
    }else{
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }

}catch(PDOException $e){
    $Errmsg.= '<br>' . $e->getLine() . '<br>' . $e->getMessage() ;
    echo $Errmsg;
}


?>
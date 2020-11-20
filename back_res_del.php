<?php

$Errmsg = '';

try{
    // require_once('connectBooks.php'); //換成自己的 php $pdo來源
    require_once('connectbook.php'); //換成自己的 php $pdo來源
    $res_no_del = $_REQUEST['res_no_del'];
    

    $sql = "DELETE FROM `restaurant_management` 
            WHERE   

                RES_NO = '$res_no_del';";

    $data = $pdo -> prepare($sql);
    $data-> execute();

    // if($data->rowCount()==0){
    //     echo '已刪除';
    // }


}catch(PDOException $e){
    $Errmsg.= $e->getLine() . '<br>' . $e->getMessage();
    echo $Errmsg;
}
    
?>
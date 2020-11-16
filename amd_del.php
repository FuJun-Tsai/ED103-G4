<?php

$Errmsg = '';

try{
    require_once('connectBooks.php'); //換成自己的 php $pdo來源
    $amd_no_del = $_REQUEST['amd_no_del'];
    

    $sql = "DELETE FROM `amd` 
            WHERE   
                AMD_no = '$amd_no_del';";

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
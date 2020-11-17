<?php

$Errmsg = '';

try{
    require_once('connectbook.php'); //換成自己的 php $pdo來源
    $amd_no_chg = $_REQUEST['amd_no_chg'];
    $amd_id_chg = $_REQUEST['amd_id_chg'];
    $amd_name_chg = $_REQUEST['amd_name_chg'];
    $amd_psd_chg = $_REQUEST['amd_psd_chg'];

    echo $amd_no_chg ;

    $sql = "UPDATE amd 
                 SET
                     AMD_ID = '$amd_id_chg' ,
                     AMD_NAME = '$amd_name_chg' ,
                     AMD_PSD = '$amd_psd_chg'
    
                 WHERE 
                     AMD_NO = $amd_no_chg ;";

    $data = $pdo -> prepare($sql);
    $data-> execute();

    if($data->rowCount()==0){
        echo '已刪除';
    }


}catch(PDOException $e){
    $Errmsg.= $e->getLine() . '<br>' . $e->getMessage();
    echo $Errmsg;
}
    
?>
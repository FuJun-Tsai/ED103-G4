<?php

$Errmsg = '';
echo $_REQUEST['RES_MES_RE_NO'];
try{
    // require_once('connectBooks.php'); //換成自己的 php $pdo來源
    require_once('connectbook.php'); //換成自己的 php $pdo來源
    $RES_MES_RE_NO = $_REQUEST['RES_MES_RE_NO'];
    

    $sql = "UPDATE `report_restaurant_message` 
            SET
                RES_MES_REPORT_STATUS = 2
            WHERE   
                RES_MES_RE_NO = '$RES_MES_RE_NO';";

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
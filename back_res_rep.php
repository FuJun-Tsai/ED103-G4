<?php
$Errmsg = '';

try{
    require_once('connectBooks.php'); //換成自己的 php $pdo來源
    // require_once('connectbook.php'); //換成自己的 php $pdo來源
    $sql = 'SELECT 
                R.RES_MES_RE_NO ,
                R.MESSAGE_NO,
                R.RES_MES_REPORT_REASON,
                R.RES_MES_REPORT_TIME,
                R.RES_MES_REPORT_STATUS,
                rm.RES_MESSAGE_WORD
            FROM report_restaurant_message R
	            JOIN restaurant_message rm on( R.MESSAGE_NO = rm.RES_MESSAGE_NO);';

    $data = $pdo->prepare($sql);
    $data-> execute();

    if($data->rowCount()==0){
        echo '資料有誤'; //資料庫沒有對應的資料
    }else{
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }

}catch(PDOException $e){
    $Errmsg.= $e->getLine() . '<br>' . $e->getMessage();
    echo $Errmsg;
}


?>
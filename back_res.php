<?php
$Errmsg = '';

try{
    // require_once('connectBooks.php'); //換成自己的 php $pdo來源
    require_once('connectbook.php'); //換成自己的 php $pdo來源
    // $sql = 'SELECT * FROM `restaurant_management`';
    $sql = 'SELECT 
                R.RES_NO,
                R.RES_NAME,
                K.KIND_NAME,
                S.STYLE_NAME,
                R.RES_ADDRESS,
                R.RES_TEL,
                R.RES_HOURS,
                R.RES_INTRODUCTION,
                R.RES_IMAGE1,
                R.RES_IMAGE2,
                R.RES_IMAGE3,
                R.RES_IMAGE4,
                R.RES_SUMMARY,
                R.RES_STATUS,
                R.RES_START,
                R.RES_CLOSE,
                R.RES_STYLE,
                R.RES_KIND

            FROM `restaurant_management` R
                JOIN `RESTAURANT_KIND` K on( R.RES_KIND = K.KIND_NO)
                
                JOIN `RESTAURANT_STYLE` S on( R.RES_STYLE = S.STYLE_NO)

            ORDER BY R.RES_NO ASC
            ;';

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
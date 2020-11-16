<?php
$Errmsg = '';

try{
    require_once('connectbook.php'); //換成自己的 php $pdo來源
    $sql = 'SELECT * FROM `amd`';

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
<?php
$Errmsg = '';

try{
    require_once('connectBooks.php'); //換成自己的 php $pdo來源
    $amd_id_add = $_GET['amd_id_add'];
    $amd_name_add = $_GET['amd_name_add'];
    $amd_psd_add = $_GET['amd_psd_add'];

    $sql = 'SELECT * FROM `amd`
            INSERT INTO amd (AMD_ID, AMD_NAME, AMD_PSD) 
            VALUES ('$amd_id_add', '$amd_name_add', '$amd_psd_add') ';

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
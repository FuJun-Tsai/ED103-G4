<?php
$Errmsg = '';

try{
    require_once('connectBooks.php'); //換成自己的 php $pdo來源
    $res_name_add = $_REQUEST['res_name_add'];
    $res_style_add = $_REQUEST['res_style_add'];
    $res_kind_add = $_REQUEST['res_kind_add'];


    $sql = "INSERT INTO restaurant_management (AMD_ID, AMD_NAME, AMD_PSD) 
            VALUES ('$amd_id_add', '$amd_name_add', '$amd_psd_add');";

    $data = $pdo->prepare($sql);
    $data-> execute();


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
                R.RES_CLOSE


            FROM `restaurant_management` R
                JOIN `RESTAURANT_KIND` K on( R.RES_KIND = K.KIND_NO)
                
                JOIN `RESTAURANT_STYLE` S on( R.RES_STYLE = S.STYLE_NO);';

    $data = $pdo->prepare($sql);
    $data-> execute();

    if($data->rowCount()==0){
        echo '無法新增';
    }else{
        $result = $data->fetch(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }


}catch(PDOException $e){
    $Errmsg.= $e->getLine() . '<br>' . $e->getMessage();
    echo $Errmsg;
}


?>



<!-- 刪除的SQL -->
<!--
     
    呼叫同一支php
    在不同情境做對應的事情
    新增的按鈕做上面的sql 
    刪除的按鈕做下面的sql
    再多傳送一個值，判斷進入哪一段SQL

 -->
<?php
    // $sql = "DELETE FROM `amd` 
    //         WHERE   
    //             AMD_ID = '$amd_id_add' AND
    //             AMD_NAME = '$amd_name_add' AND
    //             AMD_PSD = '$amd_psd_add';";
                
    // $data = $pdo -> prepare($sql);
    // $data-> execute();

    // if($data->rowCount()==0){
    //     echo '已刪除';
    // }
?>
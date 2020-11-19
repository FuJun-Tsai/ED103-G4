<?php
$Errmsg = '';
$resname = $_REQUEST['resname'];
$resstyle = $_REQUEST['resstyle'];
$reskind = $_REQUEST['reskind'];
$resaddress = $_REQUEST['resaddress'];
$resphone = $_REQUEST['resphone'];
$reswork = $_REQUEST['reswork'];
$resintro = $_REQUEST['resintro'];
$ressum = $_REQUEST['ressum'];
$resstart = $_REQUEST['resstart'];
$resclose = $_REQUEST['resclose'];

$num = 1;
$type = explode('/',$_FILES['upFile1']['type'])[1];
$imgname1 = "$resname" . "_" . "{$num}" . ".$type"; 
$from = $_FILES["upFile1"]["tmp_name"];
$fileName = $_FILES["upFile1"]["name"];
$to = "image/restaurant_management_img/{$imgname1}";
copy($from, $to);


$num+=1;
$type = explode('/',$_FILES['upFile2']['type'])[1];
$imgname2 = "$resname" . "_" . "{$num}" . ".$type";
$from = $_FILES["upFile2"]["tmp_name"];
$fileName = $_FILES["upFile2"]["name"];
$to = "image/restaurant_management_img/{$imgname2}"; 
copy($from, $to);


$num+=1;
$type = explode('/',$_FILES['upFile3']['type'])[1];
$imgname3 = "$resname" . "_" . "{$num}" . ".$type"; 
$from = $_FILES["upFile3"]["tmp_name"];
$fileName = $_FILES["upFile3"]["name"];
$to = "image/restaurant_management_img/{$imgname3}";
copy($from, $to);


$num+=1;
$type = explode('/',$_FILES['upFile4']['type'])[1];
$imgname4 = "$resname" . "_" . "{$num}" . ".$type"; 
$from = $_FILES["upFile4"]["tmp_name"];
$fileName = $_FILES["upFile4"]["name"];
$to = "image/restaurant_management_img/{$imgname4}";
copy($from, $to);


try{
    // require_once('connectBooks.php'); //換成自己的 php $pdo來源
    require_once('connectbook.php');
    
    $sql = "INSERT INTO restaurant_management (
                RES_NAME,
                RES_STYLE,
                RES_KIND,
                RES_ADDRESS,
                RES_TEL,
                RES_HOURS,
                RES_INTRODUCTION,
                RES_SUMMARY,
                RES_STATUS,
                RES_START,
                RES_CLOSE,
                RES_IMAGE1,
                RES_IMAGE2,
                RES_IMAGE3,
                RES_IMAGE4

                )

            VALUES(
                '$resname',
                $resstyle,
                $reskind,
                '$resaddress',
                $resphone,
                '$reswork',
                '$resintro',
                '$ressum',
                '0',
                '$resstart',
                '$resclose',
                '$imgname1',
                '$imgname2',
                '$imgname3',
                '$imgname4'

            );";

    echo $sql;
    $data = $pdo->prepare($sql);
    $data-> execute();




}catch(PDOException $e){
    $Errmsg.= $e->getLine() . '<br>' . $e->getMessage();
    echo $Errmsg;
}

// header('location:back_end.html');
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
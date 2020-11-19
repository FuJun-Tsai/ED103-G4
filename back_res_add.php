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

header('location:back_end.html');
?>



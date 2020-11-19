<?php
$Errmsg = '';
$res_no_chg = $_REQUEST['res_no_chg'];
$resname_chg = $_REQUEST['resname'];
$resstyle_chg = $_REQUEST['resstyle'];
$reskind_chg = $_REQUEST['reskind'];
$resaddress_chg = $_REQUEST['resaddress'];
$resphone_chg = $_REQUEST['resphone'];
$reswork_chg = $_REQUEST['reswork'];
$resintro_chg = $_REQUEST['resintro'];
$ressum_chg = $_REQUEST['ressum'];
$resstart_chg = $_REQUEST['resstart'];
$resclose_chg = $_REQUEST['resclose'];

$num = 1;
$type = explode('/',$_FILES['upFile1']['type'])[1];
$imgname1_chg = "$resname_chg" . "_" . "{$num}" . ".$type"; 
$from = $_FILES["upFile1"]["tmp_name"];
$fileName = $_FILES["upFile1"]["name"];
$to = "image/restaurant_management_img/{$imgname1}";
copy($from, $to);


$num+=1;
$type = explode('/',$_FILES['upFile2']['type'])[1];
$imgname2_chg = "$resname_chg" . "_" . "{$num}" . ".$type";
$from = $_FILES["upFile2"]["tmp_name"];
$fileName = $_FILES["upFile2"]["name"];
$to = "image/restaurant_management_img/{$imgname2}"; 
copy($from, $to);


$num+=1;
$type = explode('/',$_FILES['upFile3']['type'])[1];
$imgname3_chg = "$resname_chg" . "_" . "{$num}" . ".$type"; 
$from = $_FILES["upFile3"]["tmp_name"];
$fileName = $_FILES["upFile3"]["name"];
$to = "image/restaurant_management_img/{$imgname3}";
copy($from, $to);


$num+=1;
$type = explode('/',$_FILES['upFile4']['type'])[1];
$imgname4_chg = "$resname_chg" . "_" . "{$num}" . ".$type"; 
$from = $_FILES["upFile4"]["tmp_name"];
$fileName = $_FILES["upFile4"]["name"];
$to = "image/restaurant_management_img/{$imgname4}";
copy($from, $to);


try{
    // require_once('connectBooks.php'); //換成自己的 php $pdo來源
    require_once('connectbook.php');
    
    $sql = "UPDATE restaurant_management 
                SET(
                    RES_NAME = '$resname_chg',
                    RES_STYLE = '$resstyle_chg',
                    RES_KIND = '$reskind_chg',
                    RES_ADDRESS = '$resaddress_chg',
                    RES_TEL = '$resphone_chg',
                    RES_HOURS = '$reswork_chg',
                    RES_INTRODUCTION = '$resintro_chg',
                    RES_SUMMARY = '$ressum_chg',
                    RES_START = '$resstart_chg',
                    RES_CLOSE = '$resclose_chg',
                    RES_IMAGE1 = '$imgname1_chg',
                    RES_IMAGE2 = '$imgname2_chg',
                    RES_IMAGE3 = '$imgname3_chg',
                    RES_IMAGE4 = '$imgname4_chg'

                    )

            WHERE
                RES_NO = '$res_no_chg'

            ;";

    echo $sql;
    $data = $pdo->prepare($sql);
    $data-> execute();




}catch(PDOException $e){
    $Errmsg.= $e->getLine() . '<br>' . $e->getMessage();
    echo $Errmsg;
}

header('location:back_end.html');
?>



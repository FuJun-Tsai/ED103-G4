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

// echo $_REQUEST['resstyle'];
// echo '<br>';
// echo $_REQUEST['reskind'];
// echo '<br><br>';
// echo $resstyle_chg;
// echo $reskind_chg;


if(isset($_FILES['upFile1']['error'])!=4){
    $num = 1;
    $type = explode('/',$_FILES['upFile1']['type'])[1];
    $imgname1_chg = "$resname_chg" . "_" . "{$num}" . ".$type"; 
    $from = $_FILES["upFile1"]["tmp_name"];
    $fileName = $_FILES["upFile1"]["name"];
    $to = "image/restaurant_management_img/{$imgname1}";
    copy($from, $to);
}

if(isset($_FILES['upFile2']['error'])!=4){
    $num = 2;
    $type = explode('/',$_FILES['upFile2']['type'])[1];
    $imgname2_chg = "$resname_chg" . "_" . "{$num}" . ".$type";
    $from = $_FILES["upFile2"]["tmp_name"];
    $fileName = $_FILES["upFile2"]["name"];
    $to = "image/restaurant_management_img/{$imgname2}"; 
    copy($from, $to);
}

if(isset($_FILES['upFile3']['error'])!=4){
    $num = 3;
    $type = explode('/',$_FILES['upFile3']['type'])[1];
    $imgname3_chg = "$resname_chg" . "_" . "{$num}" . ".$type"; 
    $from = $_FILES["upFile3"]["tmp_name"];
    $fileName = $_FILES["upFile3"]["name"];
    $to = "image/restaurant_management_img/{$imgname3}";
    copy($from, $to);
}

if(isset($_FILES['upFile4']['error'])!=4){
    $num = 4;
    $type = explode('/',$_FILES['upFile4']['type'])[1];
    $imgname4_chg = "$resname_chg" . "_" . "{$num}" . ".$type"; 
    $from = $_FILES["upFile4"]["tmp_name"];
    $fileName = $_FILES["upFile4"]["name"];
    $to = "image/restaurant_management_img/{$imgname4}";
    copy($from, $to);
}


try{
    // require_once('connectBooks.php'); //換成自己的 php $pdo來源
    require_once('connectbook.php');
    
    $sql = "UPDATE restaurant_management 
                SET
                    RES_NAME = '$resname_chg' , 
                    RES_STYLE = '$resstyle_chg' , 
                    RES_KIND = '$reskind_chg' , 
                    RES_ADDRESS = '$resaddress_chg' , 
                    RES_TEL = '$resphone_chg' , 
                    RES_HOURS = '$reswork_chg' , 
                    RES_INTRODUCTION = '$resintro_chg' , 
                    RES_SUMMARY = '$ressum_chg' , 
                    RES_START = '$resstart_chg' , 
                    RES_CLOSE = '$resclose_chg' ,
                    RES_STATUS = '1'
                ";

    if(isset($_FILES['upFile1']['error'])!=4){
        $sql.= ", RES_IMAGE1 = '$imgname1_chg' ";
    };

    if(isset($_FILES['upFile2']['error'])!=4){
        $sql.= ", RES_IMAGE2 = '$imgname2_chg' ";
    };

    if(isset($_FILES['upFile3']['error'])!=4){
        $sql.= ", RES_IMAGE3 = '$imgname3_chg' ";
    };

    if(isset($_FILES['upFile4']['error'])!=4){
        $sql.= ", RES_IMAGE4 = '$imgname4_chg' ";
    };

    $sql.= " WHERE
                RES_NO = '$res_no_chg'
            ;";

    // echo '<br>';
    // echo $sql;

    $data = $pdo->prepare($sql);
    $data-> execute();




}catch(PDOException $e){
    $Errmsg.= '<br>' . $e->getLine() . '<br>' . $e->getMessage();
    echo $Errmsg;
}

header('location:back_end.html');
?>



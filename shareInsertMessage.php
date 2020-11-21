<?php
$ErrMsg='';
<<<<<<< HEAD
session_start();
$no = $_SESSION["MEMBER_NO"];
$word = $_REQUEST["word"];
$NO = $_REQUEST["no"];
try{
    require_once("./connectbook.php");
=======
echo $_REQUEST['no'];
echo '<br><br>';
echo $_REQUEST['word'];
echo '<br><br>';

try{
    require_once("./connetbook.php");
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f

    $sql = "INSERT INTO `article_message` (
            ARTICLE_NO,
            MEMBER_NO,
            ART_MES_TIME,
            ART_MESSAGE_WORD
            )

            VALUES(
            :no,
<<<<<<< HEAD
            $no,
=======
            1,
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
            now(),
            :word
            );";

    $data = $pdo->prepare($sql);
    $data-> bindValue(':no',$_REQUEST['no']);
    $data-> bindValue(':word',$_REQUEST['word']);
    $data-> execute();

<<<<<<< HEAD
    $sql = "SELECT 
                A.ARTICLE_NO as ano,
                A.MEMBER_NO as mno,
                DATE_FORMAT(A.ART_MES_TIME,'%Y-%m-%d %H:%i') as time,
                A.ART_MESSAGE_WORD as word,
                mm.MEMBER_NAME as name,
                mm.MEMBER_IMAGE as img
            FROM
                article_message A
                JOIN member_management mm ON(A.MEMBER_NO = mm.MEMBER_NO)
            WHERE
                A.ART_MESSAGE_WORD=$word AND
                A.MEMBER_NO=$no AND
                A.ARTICLE_NO=$NO 
            ;";

    $data = $pdo->prepare($sql);
    $data-> execute();

    if($data->rowCount()==0){
        echo 'error';
    }else{
        $result = $data->fetch(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }
=======
    if($data->rowCount()==0){
        echo 'PHP錯誤';
    }else{
        $result = $data->fetch(PDO::FETCH_ASSOC);
        echo JSON_encode($result);
    }
    echo $_REQUEST['no'] , $_REQUEST['word'];
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f

}catch(PDOException $e){
    $ErrMsg.= '錯誤內容' . $e->getMessage() . '<br>';
    $ErrMsg.= '錯誤行數' . $e->getLine() . '<br>';
    echo $ErrMsg;
}

// header("location:share.html");

?>
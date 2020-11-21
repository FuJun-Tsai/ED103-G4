<?php
$ErrMsg='';
// JOIN member_management mm on(A.MEMBER_NO = mm.MEMBER_NO) 
try{
<<<<<<< HEAD
    require_once("./connectbook.php");
    $sql = "SELECT 
                ART_MESSAGE_NO AS id,
                A.ARTICLE_NO AS no,
                mm.MEMBER_NAME AS name,
                mm.MEMBER_IMAGE AS headimg,
                DATE_FORMAT(A.ART_MES_TIME,'%Y-%m-%d %H:%i') AS time,
=======
    require_once("./connetbook.php");
    $sql = 'SELECT 
                A.ARTICLE_NO AS no,
                mm.MEMBER_NAME AS name,
                mm.MEMBER_IMAGE AS headimg,
                A.ART_MES_TIME AS time,
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
                A.ART_MESSAGE_WORD AS word
                
            FROM `article_message` A
                JOIN member_management mm ON(A.MEMBER_NO = mm.MEMBER_NO)

            WHERE A.ARTICLE_NO = :no
<<<<<<< HEAD
           ;";
    $data = $pdo->prepare($sql);
    $data-> bindValue(':no',$_REQUEST['no']);
    $data-> execute();

        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
=======
           ;';
    $data = $pdo->prepare($sql);
    $data-> bindValue(':no',$_REQUEST['no']);
    $data-> execute();
    // if($data->rowCount()==0){
        // echo 'PHP錯誤';
    // }else{

        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    // }
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f

}catch(PDOException $e){
    $ErrMsg.= '錯誤內容' . $e->getMessage() . '<br>';
    $ErrMsg.= '錯誤行數' . $e->getLine() . '<br>';
    echo $ErrMsg;
}


?>
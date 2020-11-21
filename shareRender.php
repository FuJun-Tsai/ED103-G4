<?php
$ErrMsg='';
<<<<<<< HEAD

try{
    require_once("./connectbook.php");
    $sql = "SELECT 
                concat('R' , A.ARTICLE_NO) as id,
=======
// JOIN member_management mm on(A.MEMBER_NO = mm.MEMBER_NO) 
try{
    require_once("./connetbook.php");
    $sql = 'select 
                concat("R" , A.ARTICLE_NO) as id,
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
                A.ARTICLE_NO as no,
                mm.MEMBER_NAME as name,
                mm.MEMBER_IMAGE as headimg,
                A.ARTICLE_TITLE as title,
                ARTICLE_WORD as word,
<<<<<<< HEAD
                DATE_FORMAT(ARTICLE_DATE,'%Y-%m-%d') as date,
                ARTICLE_IMAGE1 as img,
                ARTICLE_KIND as kind,
                (SELECT COUNT(*) FROM article_collection WHERE article_collection.ARTICLE_NO = A.ARTICLE_NO) as ac,
                (SELECT COUNT(*) FROM article_message WHERE article_message.ARTICLE_NO = A.ARTICLE_NO) as am 

            FROM `article_sharing` A
                JOIN member_management mm on(A.MEMBER_NO = mm.MEMBER_NO) 
            ORDER BY A.ARTICLE_NO ASC
           ";
=======
                ARTICLE_DATE as date,
                ARTICLE_IMAGE1 as img,
                ARTICLE_KIND as kind

            from `article_sharing` A
                JOIN member_management mm on(A.MEMBER_NO = mm.MEMBER_NO) 
           ';
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
    $data = $pdo->prepare($sql);

    $data-> execute();
    if($data->rowCount()==0){
        echo 'PHP錯誤';
    }else{

        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }

}catch(PDOException $e){
    $ErrMsg.= '錯誤內容' . $e->getMessage() . '<br>';
    $ErrMsg.= '錯誤行數' . $e->getLine() . '<br>';
    echo $ErrMsg;
}
<<<<<<< HEAD
=======

>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
?>
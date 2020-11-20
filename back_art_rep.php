<?php
$Errmsg = '';

try{
    // require_once('connectBooks.php'); //換成自己的 php $pdo來源
    require_once('connectbook.php'); //換成自己的 php $pdo來源
    $sql = 'SELECT 
                A.ARTICLE_RE_NO ,
                A.ARTICLE_NO,
                A.ART_REPORT_REASON,
                A.ART_REPORT_TIME,
                S.ARTICLE_WORD
            FROM article_report A
	            JOIN article_sharing S on( A.ARTICLE_NO = S.ARTICLE_NO);';

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
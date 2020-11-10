<?php
$ErrMsg='';
// JOIN member_management mm on(A.MEMBER_NO = mm.MEMBER_NO) 
try{
    require_once("./connetbook.php");
    $sql = 'select 
                *     
            from `article_sharing`
 
           ';
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


?>
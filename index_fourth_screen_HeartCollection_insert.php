<?php
$Errmsg='';
try{
  require_once('connectRes.php');
  $sql = "insert into `article_collection` 
           (MEMBER_NO,
           ARTICLE_NO)
  
           VALUES
           (:MEMBER_NO,
           :ARTICLE_NO) ";




          //  insert into article_collection
          //  (MEMBER_NO,
          //  ARTICLE_NO)
  
          //  VALUES
          //  (數字,
          //  數字) ;




  $data = $pdo->prepare($sql);
  $data-> execute();
//   $result = $data->fetchAll(PDO::FETCH_ASSOC);
//   echo JSON_encode($result);
//   print_r($data);


if($data->rowCount()==0){
  echo '資料有誤';
}else{
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo JSON_encode($result);
}


}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  echo $Errmsg;
}
    

?>


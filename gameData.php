<?php
$Errmsg='';

try{

  require_once('./connectBooks.php');
  $sql = "select * FROM restaurant_management;";

  $data = $pdo->prepare($sql);
  $data-> execute();

  $dataRows = $data->fetchAll(PDO::FETCH_ASSOC);
  $result = $dataRows; 

  // echo $sql;


  //全部回傳
  echo json_encode($result);


}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  echo $Errmsg;
}

// if($data->rowCount()==0){
//   echo '資料有誤';
// }else{
//   $result = $data->fetchAll(PDO::FETCH_ASSOC);
//   echo JSON_encode($result);
// }

?>
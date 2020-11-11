<?php
$Errmsg='';
// $_GET["articleNo"] ='2';
// $_GET["memberNoNum"] = '1';
$articleNo = isset($_GET["articleNo"]) ? $_GET["articleNo"] : "";
$memberNoNum = isset($_GET["memberNoNum"]) ? $_GET["memberNoNum"] : "";
try{
  require_once('connectRes.php');
  $sql = "delete from article_collection where MEMBER_NO=:articleNo and ARTICLE_NO=:memberNoNum; ";

  $data = $pdo->prepare($sql);
  $data -> bindValue(':articleNo',$articleNo);
  $data -> bindValue(':memberNoNum',$memberNoNum);
  $data-> execute();
  // $result = $data->fetchAll(PDO::FETCH_ASSOC);
//   echo JSON_encode($result);
//   print_r($data);


  // if($data->rowCount()==0){
  //   echo '資料有誤';
  // }else{
  //   // $result = $data->fetchAll(PDO::FETCH_ASSOC);；
    echo json_encode(['msg'=>$articleNo,'aa'=>$memberNoNum]);
  // }


}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  echo $Errmsg;
}
    

?>


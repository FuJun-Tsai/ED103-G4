<?php
$Errmsg='';
// $_GET["articleNo"] ='10';
// $_GET["memberNoNum"] = '1';
$articleNo = isset($_GET["articleNo"]) ? $_GET["articleNo"] : "";
$memberNoNum = isset($_GET["memberNoNum"]) ? $_GET["memberNoNum"] : "";

try{
  require_once('connectRes.php');
  $sql = "select * from `article_collection` where MEMBER_NO = :articleNo and ARTICLE_NO = :memberNoNum;";

  $data = $pdo->prepare($sql);
  $data -> bindValue(':memberNoNum',$memberNoNum);
  $data -> bindValue(':articleNo',$articleNo);
  $data-> execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);

  print_r($result);

  if(count($result) == 0){
    echo "他沒有收藏";
  }else{
    echo "他有收藏";
  }

  // if($data->rowCount()==0){
  //   echo '他沒有收藏';
  // }

// if($data->rowCount()==0){
//   echo '資料有誤';
// }else{
//   $result = $data->fetchAll(PDO::FETCH_ASSOC);
//   echo JSON_encode($result);
// }


// echo "新增成功";

}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  echo $Errmsg;
}


?>
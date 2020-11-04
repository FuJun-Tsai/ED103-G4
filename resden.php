<?php
$Errmsg='';
try{
  require_once('connectRes.php');
  $sql = "select * from restaurant_management R
            join restaurant_kind rk on (R.RES_KIND = rk.KIND_NO)
            join restaurant_style rs on (R.RES_STYLE = rs.STYLE_NO)
            
            order by RES_NO;";
  $data = $pdo->prepare($sql);
  $data-> execute();

}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
}

if($data->rowCount()==0){
  echo '資料有誤';
}else{
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo JSON_encode($result);
}

?>
<?php
$Errmsg='';

$RES_NO = isset($_GET["RES_NO"]) ? $_GET["RES_NO"] : "";
$cond3 = isset($_GET["RES_NO"]) ? " where RES_NO = $RES_NO":"";

// echo $RES_NO;
// echo $cond3;
try{

  require_once('connetbook.php');
  // SQL0 五間餐廳
  $sql0 = "select * from restaurant_management R
            join restaurant_kind rk on (R.RES_KIND = rk.KIND_NO)
            join restaurant_style rs on (R.RES_STYLE = rs.STYLE_NO)
            ";

  $data0 = $pdo->prepare($sql0);
  $data0-> execute();

  //放入陣列result[0]
  $data0Rows = $data0->fetchAll(PDO::FETCH_ASSOC);
  $result[0] = $data0Rows; 



  // SQL0 四個美食團
  $sql1 = "select F.RES_NO, MEMBER_NAME , GROUP_NAME , date(meal_time) dMT , date_format(time(meal_time),'%H : %i') hmMT  from food_group F
  join member_management MM on (F.MEMBER = MM.MEMBER_NO)" ;
  $sql1.=$cond3;

  $data1 = $pdo->prepare($sql1);
  $data1-> execute();

  //放入陣列result[1]
  $data1Rows = $data1->fetchAll(PDO::FETCH_ASSOC);
  $result[1] = $data1Rows; 


  //全部回傳
  echo json_encode($result);



}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
}

// if($data->rowCount()==0){
//   echo '資料有誤';
// }else{
//   $result = $data->fetchAll(PDO::FETCH_ASSOC);
//   echo JSON_encode($result);
// }

?>
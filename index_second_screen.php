<?php
$Errmsg='';


try{
  require_once('connectRes.php');
  // SQL0
  $sql0 = "select * from restaurant_management R
            join restaurant_kind rk on (R.RES_KIND = rk.KIND_NO)
            join restaurant_style rs on (R.RES_STYLE = rs.STYLE_NO)
            ";

  $data0 = $pdo->prepare($sql0);
  $data0-> execute();

  //放入陣列result[0]
  $data0Rows = $data0->fetchAll(PDO::FETCH_ASSOC);
  $result[0] = $data0Rows; 



  // SQL1
  $sql1 = "select * from food_group F
	          join member_management MM on (F.MEMBER = MM.MEMBER_NO)
            ";
  $data1 = $pdo->prepare($sql1);
  $data1-> execute();

//放入陣列result[1]
  $data1Rows = $data1->fetchAll(PDO::FETCH_ASSOC);
  $result[1] = $data1Rows; 



  // SQL2
  $sql2 = "select * from article_collection AC
            join member_management MM on (AC.MEMBER_NO = MM.MEMBER_NO)
              ";                    

  $data2 = $pdo->prepare($sql2);
  $data2-> execute();

//放入陣列result[2]
  $data2Rows = $data2->fetchAll(PDO::FETCH_ASSOC);
  $result[2] = $data2Rows; 




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
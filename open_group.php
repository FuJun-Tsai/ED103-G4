<?php
$Errmsg='';

    $RES_KIND = isset($_GET["RES_KIND"]) ? $_GET["RES_KIND"] : "";
    $cond1 = isset($_GET["RES_KIND"]) ? "RES_KIND = $RES_KIND" : "";
    $RES_STYLE = isset($_GET["RES_STYLE"]) ? $_GET["RES_STYLE"] : "";
    $cond2 = isset($_GET["RES_STYLE"]) ? "RES_STYLE = $RES_STYLE" : "" ;


echo $cond1;

try{
  require_once('connectRes.php');
  $sql = "select * from restaurant_management R
            join restaurant_kind rk on (R.RES_KIND = rk.KIND_NO)
            join restaurant_style rs on (R.RES_STYLE = rs.STYLE_NO)
            ";

    if($cond1!=""){ // 
      $sql.="where $cond1";
      if($cond2!= ""){
          $sql.="and $cond2";
      }
  }else{
      if($cond2!=""){
          $sql.="where $cond2";
      }
  }
    




  $data0 = $pdo->prepare($sql);
  // $data0-> bindValue(':RES_KIND',$RES_KIND);
  $data0-> execute();

  //放入陣列result[0]
  $data0Rows = $data0->fetchAll(PDO::FETCH_ASSOC);
  $result[0] = $data0Rows; 

  $sql1 = "select T.friends_NO , Mf.member_name from track_list T
	          join member_management Mm on (T.member_NO = Mm.member_NO)
            join member_management Mf on (T.friends_NO = Mf.member_NO)
            ";                    
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
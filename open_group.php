<?php
$Errmsg='';

    $RES_KIND = isset($_GET["RES_KIND"]) ? $_GET["RES_KIND"] : "";
    $cond1 = isset($_GET["RES_KIND"]) ? "RES_KIND = $RES_KIND" : "";
    $RES_STYLE = isset($_GET["RES_STYLE"]) ? $_GET["RES_STYLE"] : "";
    $cond2 = isset($_GET["RES_STYLE"]) ? "RES_STYLE = $RES_STYLE" : "" ;
    $GROUP_NO = isset($_GET["GROUP_NO"]) ? $_GET["GROUP_NO"] : "";
    $cond3 = isset($_GET["GROUP_NO"]) ? " and fg.GROUP_NO = $GROUP_NO order by GROUP_NO ":"";

// echo $cond3;

// echo $RES_KIND;
// echo  $RES_STYLE;

// echo $cond1;
// echo  $cond2;

try{
  require_once('connectRes.php');
  //抓取全部餐廳
  $sql = "select * from restaurant_management R
            join restaurant_kind rk on (R.RES_KIND = rk.KIND_NO)
            join restaurant_style rs on (R.RES_STYLE = rs.STYLE_NO)
            ";

    if($cond1!=""){ 
      $sql.=" where $cond1";
      if($cond2!= ""){
          $sql.=" and $cond2";
      }
  }else{
      if($cond2!=""){
          $sql.=" where $cond2";
      }
  }
  $sql.=" order by RES_NO ASC";
  
// echo $sql ,'<br>','<br>','<br>';
  $data0 = $pdo->prepare($sql);
  $data0-> execute();

  //放入陣列result[0]
  $data0Rows = $data0->fetchAll(PDO::FETCH_ASSOC);
  $result[0] = $data0Rows; 

//好友資訊
  $sql1 = "select T.friends_NO , Mf.member_name from track_list T
	          join member_management Mm on (T.member_NO = Mm.member_NO)
            join member_management Mf on (T.friends_NO = Mf.member_NO)
            "; 

  $data1 = $pdo->prepare($sql1);
  $data1-> execute();

//放入陣列result[1]
  $data1Rows = $data1->fetchAll(PDO::FETCH_ASSOC);
  $result[1] = $data1Rows;
  
  // print_r($result[1]);

  //美食團資訊
  $sql2 = "
  select distinct 
  GROUP_NAME, 
  MEMBER, 
  RES_NAME, 
  MEAL_TIME, 
  END_TIME, 
  MAX_NUMBER, 
  JOIN_NUMBER, 
  fgp.GROUP_NO GROUP_NO, 
  rk.KIND_NAME KIND_NAME, 
  rs.STYLE_NAME STYLE_NAME, 
  rm.RES_ADDRESS RES_ADDRESS, 
  rm.RES_TEL RES_TEL, 
  rm.RES_IMAGE1 RES_IMAGE1, 
  rm.RES_IMAGE2 RES_IMAGE2, 
  rm.RES_IMAGE3 RES_IMAGE3, 
  rm.RES_IMAGE4 RES_IMAGE4, 
  mm.MEMBER_IMAGE MEMBER_IMAGE, 
  rm.RES_START RES_START, 
  rm.RES_CLOSE RES_CLOSE,
  mm.MEMBER_NAME MEMBER_NAME,
  rk.KIND_NO,
  rs.STYLE_NO
  
  

  from food_group fg
  join food_group_people fgp on(fg.GROUP_NO=fgp.GROUP_NO)
  join restaurant_management rm on(fg.RES_NO=rm.RES_NO)
  join restaurant_kind rk on(rm.RES_kind=rk.kind_NO)
  join restaurant_style rs on(rm.res_style=rs.style_NO)
  join member_management mm on(fg.MEMBER=mm.MEMBER_NO)";                    

  $data2 = $pdo->prepare($sql2);
  $data2-> execute();

//放入陣列result[2]
  $data2Rows = $data2->fetchAll(PDO::FETCH_ASSOC);
  $result[2] = $data2Rows; 
  
//美食團燈箱裡的東西
$sql3="
      SELECT fg.MEMBER, fgp.MEMBER_NO, mm.MEMBER_NAME, fg.GROUP_NO, fgp.MEMBER_STATUS FROM ed103g4.food_group fg
      join food_group_people fgp on(fg.GROUP_NO=fgp.GROUP_NO)
      join member_management mm on(fgp.MEMBER_NO=mm.MEMBER_NO)
      where fgp.MEMBER_STATUS=3";
      $sql3.= $cond3;

      $data3 = $pdo->prepare($sql3);
      $data3-> execute();
    
    //放入陣列result[3]
      $data3Rows = $data3->fetchAll(PDO::FETCH_ASSOC);
      $result[3] = $data3Rows; 

//美食團目前參加人數
    $sql4="SELECT GROUP_NO, MEMBER_NO, MEMBER_STATUS, COUNT(*) NUM FROM food_group_people WHERE MEMBER_STATUS=3 GROUP BY GROUP_NO";

      $data4 = $pdo->prepare($sql4);
      $data4-> execute();
    
    //放入陣列result[4]
      $data4Rows = $data4->fetchAll(PDO::FETCH_ASSOC);
      $result[4] = $data4Rows; 

//美食團團號
$sql5="SELECT max(GROUP_NO) max FROM food_group";

$data5 = $pdo->prepare($sql5);
$data5-> execute();

//放入陣列result[5]
$data5Rows = $data5->fetchAll(PDO::FETCH_ASSOC);
$result[5] = $data5Rows; 



  //全部回傳
  echo json_encode($result);


}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  // echo $Errmsg;
}

// if($data->rowCount()==0){
//   echo '資料有誤';
// }else{
//   $result = $data->fetchAll(PDO::FETCH_ASSOC);
//   echo JSON_encode($result);
// }

?>
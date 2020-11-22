<?php
$Errmsg = '';
session_start();

$groupNo = isset($_GET["groupNo"]) ? $_GET["groupNo"] : "";
// $cond1 = isset($_GET["groupNo"]) ? "groupNo = $groupNo;" : "";

// $groupNo = isset($_GET["groupNo"]) ? $_GET["groupNo"] : "";
// $groupName = isset($_GET["groupName"]) ? $_GET["groupName"] : "";
// $resNo = isset($_GET["resNo"]) ? $_GET["resNo"] : "";
// $mealDate = isset($_GET["mealDate"]) ? $_GET["mealDate"] : "";
// $nowNumJoin = isset($_GET["nowNumJoin"]) ? $_GET["nowNumJoin"] : "";
// $nowNumMax = isset($_GET["nowNumMax"]) ? $_GET["nowNumMax"] : "";
// $friendCheckboxVal=isset($_GET["friendCheckboxVal"]) ? $_GET["friendCheckboxVal"] : "";
// $memberNoNum=isset($_GET["memberNoNum"]) ? $_GET["memberNoNum"] : "";




try{

  require_once('connectbook.php');

  //美食團資訊
  $sql1 = "
  select distinct 
  GROUP_NAME, 
  MEMBER, 
  RES_NAME, 
  date_format(MEAL_TIME,'%Y-%m-%d %H:%i') MEAL_TIME, 
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
  date_format(rm.RES_START,'%H:%i') RES_START,
  date_format(rm.RES_CLOSE,'%H:%i') RES_CLOSE,
  mm.MEMBER_NAME MEMBER_NAME,
  rk.KIND_NO,
  rs.STYLE_NO
  
  

  from food_group fg
  join food_group_people fgp on(fg.GROUP_NO=fgp.GROUP_NO)
  join restaurant_management rm on(fg.RES_NO=rm.RES_NO)
  join restaurant_kind rk on(rm.RES_kind=rk.kind_NO)
  join restaurant_style rs on(rm.res_style=rs.style_NO)
  join member_management mm on(fg.MEMBER=mm.MEMBER_NO)" ;                    


  if($groupNo!=""){
    $sql1.=" where fgp.GROUP_NO=$groupNo";

    $data1 = $pdo->prepare($sql1);
    $data1-> execute();
  
  //放入陣列result[1]
    $data1Rows = $data1->fetchAll(PDO::FETCH_ASSOC);
    $result[1] = $data1Rows; 
    

  }else{

    $data1 = $pdo->prepare($sql1);
    $data1-> execute();
  
  //放入陣列result[1]
    $data1Rows = $data1->fetchAll(PDO::FETCH_ASSOC);
    $result[1] = $data1Rows; 
    

  }
  
// 美食團燈箱裡的東西
 $sql2="
//       SELECT fg.MEMBER, fgp.MEMBER_NO, mm.MEMBER_NAME, fg.GROUP_NO, fgp.MEMBER_STATUS FROM ed103g4.food_group fg
//       join food_group_people fgp on(fg.GROUP_NO=fgp.GROUP_NO)
//       join member_management mm on(fgp.MEMBER_NO=mm.MEMBER_NO)
//       where fgp.MEMBER_STATUS=3";
//       $sql2.= $cond2;

//       $data2 = $pdo->prepare($sql2);
//       $data2-> execute();
    
//     //放入陣列result[3]
//       $data2Rows = $data2->fetchAll(PDO::FETCH_ASSOC);
//       $result[2] = $data2Rows; 

// //美食團目前參加人數
//     $sql3="SELECT GROUP_NO, MEMBER_NO, MEMBER_STATUS, COUNT(*) NUM FROM food_group_people GROUP BY GROUP_NO";
//     // WHERE MEMBER_STATUS=3 
//       $data3 = $pdo->prepare($sql3);
//       $data3-> execute();
    
//     //放入陣列result[4]
//       $data3Rows = $data3->fetchAll(PDO::FETCH_ASSOC);
//       $result[3] = $data3Rows; 

// //美食團團號
// $sql4="SELECT max(GROUP_NO) max FROM food_group";

// $data4 = $pdo->prepare($sql4);
// $data4-> execute();

// //放入陣列result[5]
// $data4Rows = $data4->fetchAll(PDO::FETCH_ASSOC);
// $result[4] = $data4Rows; 


  //全部回傳
  echo json_encode($result);

}catch(PDOException $e){
    $Errmsg.= $e->getLine() . '<br>' . $e->getMessage();
    echo $Errmsg;
}


?>
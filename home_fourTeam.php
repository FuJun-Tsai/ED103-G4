<?php
$Errmsg = '';
session_start();
try{
  $GROUP_NO = isset($_GET["GROUP_NO"]) ? $_GET["GROUP_NO"] : "";
  $cond3 = isset($_GET["GROUP_NO"]) ? " and fg.GROUP_NO = $GROUP_NO order by GROUP_NO ":"";
  
  
  
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
  
  
  
  //美食團團號
  // $sql5="SELECT max(GROUP_NO) max FROM food_group";
  $sql5="SELECT GROUP_NO FROM food_group";

  
  $data5 = $pdo->prepare($sql5);
  $data5-> execute();
  
  //放入陣列result[5]
  $data5Rows = $data5->fetchAll(PDO::FETCH_ASSOC);
  $result[5] = $data5Rows; 
  
  //全部回傳
  echo json_encode($result);

}catch(PDOException $e){
    $Errmsg.= $e->getLine() . '<br>' . $e->getMessage();
    echo $Errmsg;
}


?>
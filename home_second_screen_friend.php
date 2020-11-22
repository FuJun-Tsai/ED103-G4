<?php
session_start();
$Errmsg='';
$groupNo = isset($_GET["groupNo"]) ? $_GET["groupNo"] : "";
$cond3 = isset($_GET["groupNo"]) ? " and fg.GROUP_NO = $groupNo order by GROUP_NO ":"";

try{
  require_once('./connectbook.php');

//美食團燈箱裡的東西
$sql="
SELECT fg.MEMBER, fgp.MEMBER_NO FRIEND, mm.MEMBER_NAME, fg.GROUP_NO, fgp.MEMBER_STATUS FROM ed103g4.food_group fg
join food_group_people fgp on(fg.GROUP_NO=fgp.GROUP_NO)
join member_management mm on(fgp.MEMBER_NO=mm.MEMBER_NO)
where fgp.MEMBER_STATUS=3";
      $sql.= $cond3;
      $data = $pdo->prepare($sql);
      $data-> execute();
    
   
      $dataRows = $data->fetchAll(PDO::FETCH_ASSOC);
      $result = $dataRows; 
echo json_encode($result);

}catch(PDOException $e){
  $Errmsg.= '錯誤內容：' . $e->getMessage() . '<br>';
  $Errmsg.= '錯誤行數：' . $e->getLine() . '<br>';
  echo $Errmsg;
}



?>


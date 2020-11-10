<?php
session_start();
try{
  require_once("../connectRes.php");
  $sql = " SELECT r.RES_IMAGE1, f.GROUP_NAME, r.RES_NAME, DATE(f.MEAL_TIME) 'DATE',Date_format((f.MEAL_TIME),'%H:%i') 'TIME'
  FROM `food_group` f JOIN food_group_people fdp ON (f.GROUP_NO = fdp.GROUP_NO)
          JOIN `restaurant_management` r ON (r.RES_NO = f.RES_NO)
                  JOIN `member_management` m ON (m.MEMBER_NO = fdp.MEMBER_NO)
  WHERE  m.MEMBER_ID =:MEMBER_ID AND m.MEMBER_PSW =:MEMBER_PSW";
  $join = $pdo->prepare($sql);
  $join->bindValue(":MEMBER_ID", $_POST["MEMBER_ID"]);
  $join->bindValue(":MEMBER_PSW", $_POST["MEMBER_PSW"]);
  $join->execute();
  if( $join->rowCount()==0){ 
	  echo "{}";
  }else{ 
  	$joinRow = $join->fetchALL(PDO::FETCH_ASSOC);
    echo json_encode($joinRow) ;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
   echo json_encode($error);//{"errorMsg":"......."}
}
?>


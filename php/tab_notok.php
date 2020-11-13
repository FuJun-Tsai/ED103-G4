<?php
session_start();
try{
  require_once("../connectRes.php");
  $sql = " SELECT m.MEMBER_IMAGE, f.GROUP_NAME, r.RES_NAME, DATE(f.MEAL_TIME) 'DATE',Date_format((f.MEAL_TIME),'%H:%i') 'TIME'
  FROM `food_group` f JOIN `food_group_people` fdp ON (f.GROUP_NO = fdp.GROUP_NO)
          JOIN `restaurant_management` r ON (r.RES_NO = f.RES_NO)
                  JOIN `member_management` m ON (m.MEMBER_NO = f.MEMBER)
  WHERE  fdp.MEMBER_NO IN (SELECT fdp1.MEMBER_NO
                        FROM `food_group_people`fdp1 JOIN `member_management` m1 ON(fdp1.MEMBER_NO = m1.MEMBER_NO)
                        WHERE  m1.MEMBER_ID =:MEMBER_ID)
  AND fdp.MEMBER_STATUS = 0 ";
  $join = $pdo->prepare($sql);
  $join->bindValue(":MEMBER_ID", $_SESSION["MEMBER_ID"]);
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


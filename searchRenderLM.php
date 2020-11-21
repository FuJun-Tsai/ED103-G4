<<<<<<< HEAD
<?php
=======
<?
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
$ErrMsg='';
$e = explode(',',$_REQUEST['e']);
$word = '';
for($i=0;$i<count($e);$i+=1){
    $e[$i] = (string)$e[$i];
    if($i!=count($e)-1){
        $word.="'$e[$i]',";
    }else{
        $word.="'$e[$i]'";
    }
}
try{
<<<<<<< HEAD
    require_once('./connectbook.php');
    $sql = "SELECT 
                R.RES_MESSAGE_NO,
                concat('R' , R.RES_NO) as resno,
                concat('L' , R.RES_MESSAGE_NO) as id,
                DATE_FORMAT(R.RES_MES_TIME,'%Y-%m-%d %H:%i') as time,
                R.RES_MESSAGE_WORD as content,
                mm.MEMBER_IMAGE as mmimg

            FROM restaurant_message R
                JOIN member_management mm on(R.MEMBER_NO = mm.MEMBER_NO)  

            WHERE 
                RES_NO in($word)

            ORDER BY RES_NO;";
  
    $RESdata = $pdo->prepare($sql);
    $RESdata-> execute();
    // echo $sql;
=======
    require_once('./connetbook.php');
    $sql = "select 
                concat('R' , R.RES_NO) as resno,
                concat('L' , R.RES_MESSAGE_NO) as id,
                R.RES_MES_TIME as time,
                R.RES_MESSAGE_WORD as content,
                mm.MEMBER_IMAGE as mmimg

            from restaurant_message R
                JOIN member_management mm on(R.MEMBER_NO = mm.MEMBER_NO)    

            where RES_NO in($word)

            order by RES_NO;";
  
    $RESdata = $pdo->prepare($sql);
    $RESdata-> execute();

>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
    if($RESdata->rowCount()==0){
        echo '資料有誤';
    }else{
        $result = $RESdata->fetchAll(PDO::FETCH_ASSOC);
        echo JSON_encode($result);
    }
    
}catch(PDOException $e){
    $ErrMsg.= $e->getMessage() . '<br>' . $e->getLine();
    echo $ErrMsg;
}

?>
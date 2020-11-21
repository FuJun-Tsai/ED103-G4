<?php
$Errmsg='';
session_start();
$condition = $_SESSION['MEMBER_NO'];
try{
<<<<<<< HEAD
    require_once('connectbook.php');
=======
    require_once('connetbook.php');
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
    $sql = "SELECT MEMBER_NO ,
                   concat('R' , RES_NO) as ID
            FROM `restaurant_collection` 
            where ";
    
    $sql.= ' ; ';

    $data = $pdo->prepare($sql);
    $data-> execute();
    
    if($data->rowCount()==0){
        echo '資料有誤';
    }else{
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }

}catch(PDOException $e){
    $Errmsg.= $e->getLine() . '<br>' . $e->getMessage();
    echo $Errmsg;
}

?>
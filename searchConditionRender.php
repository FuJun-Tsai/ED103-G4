<<<<<<< HEAD
<?php
$ErrMsg = '';
$condition = explode("&",$_REQUEST['condition']);
$word = '';
$num = (settype($_REQUEST['page'],'integer')-1)*4;
$page = $_REQUEST['page'] ? ($_REQUEST['page'])*4 : 0;
$kind = $condition[0];

if($condition[1]){
    $item = explode(",",$condition[1]);

    for($i=0;$i<count($item);$i+=1){
        if($i!=count($item)-1){
            $word.="$item[$i],";
        }else{
            $word.="$item[$i]";
        }
    }
}
// echo $word;

try{
    require_once('./connectbook.php');
=======
<?
$ErrMsg = '';
$condition = explode("&",$_REQUEST['condition']);
$word = '';
if(strlen($condition[1])>2){
    $item = explode(",",$condition[1]);
    for($i=0;$i<count($item);$i+=1){
        if($i!=count($item)-1){
            $word.="'$item[$i]',";
        }else{
            $word.="'$item[$i]'";
        }
    }
}
$search = $_REQUEST['search'];

try{
    require_once('./connetbook.php');
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
    $sql = 'select  
                R.RES_NO as no,
                concat("R" , R.RES_NO) as id,
                R.RES_NAME as name,
                rk.KIND_NAME as kind,
                rs.STYLE_NAME as style,
                R.RES_IMAGE1 as img1,
<<<<<<< HEAD
                R.RES_SUMMARY as summary,
                (SELECT COUNT(*) FROM restaurant_collection WHERE restaurant_collection.RES_NO = R.RES_NO) as rc ,
                (SELECT COUNT(*) FROM restaurant_message WHERE restaurant_message.RES_NO = R.RES_NO) as rm ,
                (SELECT COUNT(*) FROM food_group WHERE food_group.RES_NO = R.RES_NO) as fg 
=======
                R.RES_SUMMARY as summary
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f

            from `restaurant_management` R
                JOIN restaurant_style rs on (R.RES_STYLE = rs.STYLE_NO)
                JOIN restaurant_kind rk on (R.RES_KIND = rk.KIND_NO)
            ';

    if(strlen($_REQUEST['condition'])>1){
        $sql.= ' where ';
        if($condition[0]){
<<<<<<< HEAD
            $sql.= " rk.KIND_NO = $kind";
=======
            $sql.= ' rk.KIND_NO = :kind ';
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
        };
        if($condition[0] and $condition[1]){
            $sql.= ' and ';
        };
        if(strlen($condition[1])>2){
            $sql.= " rs.STYLE_NO in($word) ";
        }else if($condition[1]){
<<<<<<< HEAD
            // $sql.= ' rs.STYLE_NO in(:style) '; 
            $sql.= " rs.STYLE_NO in($word) ";

=======
            $sql.= ' rs.STYLE_NO in(:style) '; 
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
        };
    };

    $sql.= ' order by no ASC;';

    $data = $pdo->prepare($sql);
<<<<<<< HEAD
    // if($condition[0]){
    //     $data-> bindValue(':kind',$condition[0]);
    // };
    // if($condition[1]){
    //     $data-> bindValue(':style',$condition[1]);
    // };
    // echo $sql;
    $data-> execute();
    
    if($data->rowCount()==0){
        echo 'error';
    }else{
        $result[0] = $data->fetchAll(PDO::FETCH_ASSOC);
    };

    $sql = 'select  
                R.RES_NO as no,
                concat("R" , R.RES_NO) as id,
                R.RES_NAME as name,
                rk.KIND_NAME as kind,
                rs.STYLE_NAME as style,
                R.RES_IMAGE1 as img1,
                R.RES_SUMMARY as summary,
                (SELECT COUNT(*) FROM restaurant_collection WHERE restaurant_collection.RES_NO = R.RES_NO) as rc ,
                (SELECT COUNT(*) FROM restaurant_message WHERE restaurant_message.RES_NO = R.RES_NO) as rm ,
                (SELECT COUNT(*) FROM food_group WHERE food_group.RES_NO = R.RES_NO) as fg 

            from `restaurant_management` R
                JOIN restaurant_style rs on (R.RES_STYLE = rs.STYLE_NO)
                JOIN restaurant_kind rk on (R.RES_KIND = rk.KIND_NO)
            ';

    if(strlen($_REQUEST['condition'])>1){
        $sql.= ' where ';
        if($condition[0]){
            $sql.= " rk.KIND_NO = $kind";
        };
        if($condition[0] and $condition[1]){
            $sql.= ' and ';
        };
        if(strlen($condition[1])>2){
            $sql.= " rs.STYLE_NO in($word) ";
        }else if($condition[1]){
            // $sql.= ' rs.STYLE_NO in(:style) '; 
            $sql.= " rs.STYLE_NO in($word) ";

        };
    };

    $sql.= " order by no ASC LIMIT $page,4;";

    $data = $pdo->prepare($sql);
=======
>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f
    if($condition[0]){
        $data-> bindValue(':kind',$condition[0]);
    };
    if($condition[1]){
        $data-> bindValue(':style',$condition[1]);
    };
    $data-> execute();
<<<<<<< HEAD

    if($data->rowCount()==0){
        echo 'error';
    }else{
        $result[1] = $data->fetchAll(PDO::FETCH_ASSOC);
    };
    $result[2] = $page;
    echo json_encode($result);
=======
    if($data->rowCount()==0){
        echo 'error';
    }else{
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo JSON_encode($result);
    };

>>>>>>> 619f65a39a25f34385a8b62c2b7bfc58b20c5e7f

}catch(PDOException $e){
    $ErrMsg.= $e->getMessage() . $e->getLine();
    echo $ErrMsg;
}
?>
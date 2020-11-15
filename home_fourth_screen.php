<?php
$Errmsg='';


try{
  require_once('connectRes.php');
  // SQL0 最多收藏
  $sql0 = "select * from article_collection AC
            join member_management MM on (AC.MEMBER_NO = MM.MEMBER_NO)
            join article_sharing A_S on (AC.MEMBER_NO = A_S.MEMBER_NO)
            order by article_like desc
            limit 1;  
          ";

  $data0 = $pdo->prepare($sql0);
  $data0-> execute();

  //放入陣列result[0]
  $data0Rows = $data0->fetchAll(PDO::FETCH_ASSOC);
  $result[0] = $data0Rows; 



  // SQL1 最多留言
  $sql1 = "select * from article_collection AC
            join member_management MM on (AC.MEMBER_NO = MM.MEMBER_NO)
            join article_sharing A_S on (AC.MEMBER_NO = A_S.MEMBER_NO)
            order by message_total desc
            limit 1;   
          ";
  $data1 = $pdo->prepare($sql1);
  $data1-> execute();

//放入陣列result[1]
  $data1Rows = $data1->fetchAll(PDO::FETCH_ASSOC);
  $result[1] = $data1Rows; 



//   // SQL2 最多分享
//   $sql2 = "select * from article_collection AC
//             join member_management MM on (AC.MEMBER_NO = MM.MEMBER_NO)
//             join article_sharing AS on (AC.MEMBER_NO = AS.MEMBER_NO)  
//           ";                  

//   $data2 = $pdo->prepare($sql2);
//   $data2-> execute();

// //放入陣列result[2]
//   $data2Rows = $data2->fetchAll(PDO::FETCH_ASSOC);
//   $result[2] = $data2Rows; 



  // SQL3 加入收藏
//   $sql3 = "insert into `article_collection` 
//             (MEMBER_NO,
//             ARTICLE_NO)

//             VALUES
//             (:MEMBER_NO,
//             :ARTICLE_NO); 
//           ";                  

//   $data3 = $pdo->prepare($sql3);
//   $data3-> execute();

// //放入陣列result[3]
//   $data3Rows = $data3->fetchAll(PDO::FETCH_ASSOC);
//   $result[3] = $data3Rows; 





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
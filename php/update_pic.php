<?php
try{
  session_start();
  require_once("../connectbook.php");
  $no = $_SESSION["MEMBER_NO"];
  $dest_folder = "../image/member/";
  $tmp_name = $_FILES["theFile"]["tmp_name"];
  $a=explode(".",$_FILES["theFile"]["name"]);
  print_r($_FILES["theFile"]);
  $name = "headshot$no".".".$a[1];
  $uploadfile = $dest_folder.$name;
  move_uploaded_file($tmp_name, $uploadfile);

  header("Content-type: text/html; charset=utf-8");
  echo "圖片上傳成功".$uploadfile."";
  switch($_FILES["theFile"]["error"]){
    case UPLOAD_ERR_OK :
      $dir = "../image/member";
      //檢查資料夾是否己存在
      if(file_exists($dir)==false){
        echo "無此資料夾<br>";
        // mkdir($dir);//make directory
      }
  
      // $from = $_FILES["theFile"]["tmp_name"]; //暫存區中的路徑和檔名
      // $fileName = $_FILES["theFile"]["name"];//原始檔案名稱
      // $to = "{$dir}/{$fileName}";
      // if(copy($from, $to)){
      //   echo "上傳成功<br>";
      // }else{
      //   echo "上傳失敗<br>";
      // }
  
      break;
    case UPLOAD_ERR_INI_SIZE :
      echo "上傳的檔案太大, 不得超過", ini_get("upload_max_filesize"), "<br>";
      break;
    case UPLOAD_ERR_FORM_SIZE :
      echo "上傳的檔案太大, 不得超過", $_POST["MAX_FILE_SIZE"], "位元組<br>";
      break;
    case UPLOAD_ERR_PARTIAL :
      echo "上傳檔案不完整", "<br>";
      break;
    case UPLOAD_ERR_NO_FILE :
      echo "未選檔案", "<br>";
      break;		
    default:
      echo "系統暫時發生問題，請聯絡網站維護人員~~<br>"	;		
  }

  $sql = "UPDATE `member_management`
  SET MEMBER_IMAGE = :MEMBER_IMAGE
  WHERE MEMBER_ID = :MEMBER_ID ";

  // var_dump($_POST["MEMBER_PSW"]);
  // die;
  
  $member = $pdo->prepare($sql);
  $member->bindValue(":MEMBER_ID", $_SESSION["MEMBER_ID"]);
  $member->bindValue(":MEMBER_IMAGE", $name);
  $member->execute();
  if( $member->rowCount()==0){ //查無此人人
	  echo "{}";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memRow = $member->fetch(PDO::FETCH_ASSOC);
    // //--------------將登入者的資料寫入session
    $_SESSION["MEMBER_IMAGE"] = $memRow["MEMBER_IMAGE"];

    //送出登入者的相關資料
    echo json_encode($memRow) ;
  }
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);//{"errorMsg":"......."}
}
?>


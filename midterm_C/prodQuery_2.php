<?php
try {
  require_once("./connectRes.php");
  $sql = "select * from products where psn=?";
  $products = $pdo->prepare($sql);
  $products->bindValue(1, $_GET["psn"]);
  $products->execute();
  $prodRow = $products->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>查詢商品資料</title>
<style>
th {
  background:#bfbfef;
}
td {
  border-bottom:1px deeppink dotted;
}
</style>
</head>

<body>
<br>
<h2 style="text-align:center;color:deeppink">書籍基本資料</h2>
  <table align="center" width="300" >
    <tr><th>書號</th><td><?=$prodRow["psn"]?></td></tr>
    <tr><th>書名</th><td><?=$prodRow["pname"]?></td></tr>
    <tr><th>價格</th><td><?=$prodRow["price"]?></td></tr>
    <tr><th>作者</th><td><?=$prodRow["author"]?></td></tr>
    <tr><th>頁數</th><td><?=$prodRow["pages"]?></td></tr>
    <tr><th>圖檔</th><td><img src="images/<?=$prodRow["image"]?>"></td></tr>
  </table>
  </body>
</html>

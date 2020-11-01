<?php 
try {
	require_once("connectBooks.php");
	$sql = "select * from products";
	$products = $pdo->query($sql);
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	
}
 ?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
<style type="text/css">
h2 {
	color:deeppink;
}	
td {
	border-bottom:1px dotted deeppink;
}
a {
	text-decoration:none;
}
a:hover {
	text-decoration:underline;
}

.prodImg{
	width:50px;
}
</style>
</head>
<body>
<div style="background-color:#bfbfef;text-align:right">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="cartShow.php">檢視購物車</a>
</div>	<br>
	
<table align="center" width="600">
	<tr bgcolor="#bfbfef"><th>書號</th><th>書名</th><th>價格</th><th>作者</th><th>圖片</th><th>購買</th></tr>
	<?php foreach($prodRows as $i=>$prodRow){ ?>
		<tr>
			<td><?=$prodRow["psn"]?></td>
			<td><a href="prodQuery.php?psn=<?=$prodRow["psn"]?>">
				<span class="prodName"><?=$prodRow["pname"]?></span></a>	
			</td>
			<td><?=$prodRow["price"]?></td>
			<td><?=$prodRow["author"]?></td>
			<td><img src="images//<?=$prodRow["image"]?>" class="prodImg"></td>
			<td><input type="button" class="btnCartAdd" value="放入購物車"></td>
		</tr>
	<?php } ?>
		
</table>     
<script type="text/javascript">
window.addEventListener("load", function(){
	let btnCartAdds = document.getElementsByClassName("btnCartAdd");
	let prodNames = document.getElementsByClassName("prodName");
	for( let i=0; i<btnCartAdds.length; i++){
		btnCartAdds[i].onclick = function(){
			console.log(i);
			alert( "確定購買" + prodNames[i].innerText + "商品嗎?");
		}
	}
})
</script>
</body>
</html>
<?php
//連接資料庫
if( !isset($_GET['id']) || empty($_GET['id']) )
{
	echo $_GET['id'];
    echo '參數不正確';
	echo '<a href="add_form.html">重新輸入</a>';
    exit;
}
try {
	$db = new PDO('mysql:host=localhost;dbname=test0329;charset=utf8'
		,'mememe','123456', array( 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		) );
}catch(PDOException $err) {
	echo "ERROR:";
	echo $err->getMessage();  //真實世界不這樣做
	exit;
}

$stmt = $db->prepare('select * from moneybook where m_id=?');
$stmt->execute([$_GET['id']]);
$row = $stmt->fetch();
if (!$row){
	echo "參數不正確";
	exit();
}


?>
<!DOCTYPE html>
<html lang="zh_Hant">
<head>
	<meta charset="utf-8">
	<title>編輯</title>
</head>
<body>
	<form method="POST" action="update.php">
	<input type="hidden" name="id" value="<?php echo $row['m_id']; ?>">
	請輸入商品:<input type="text" name="prod" value="<?php echo $row['name']; ?>">
	金額:<input type="text" name="price" value="<?php echo $row['cost']; ?>">
	<input type="submit">
	</form>
	<a href="list.php">取消<a>
</body>
</html>
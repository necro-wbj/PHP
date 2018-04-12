<?php
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
	echo '<a href="add.php">重新輸入<a>';
	exit;
}
$stmt = $db->prepare('delete from moneybook where m_id=?');
$stmt->execute([$_GET['id']]);

header('Location:list.php',true,303);

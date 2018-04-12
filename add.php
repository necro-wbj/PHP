<?php
if( !isset($_POST['prod']) || !isset($_POST['price'])
	|| empty($_POST['price']) 
	|| empty($_POST['prod']) )
	{
    echo '參數不正確';
	echo '<a href="add_form.html">重新輸入</a>';
    exit ;
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
	echo '<a href="add_form.html">重新輸入</a>';
	exit;
}

//echo "連線成功";

$stmt = $db->prepare('insert into moneybook (name,cost) values (?,?)');
$stmt->execute([$_POST['prod'],$_POST['price']]);

//echo '新增了';
//echo $stmt->rowCount();
//echo '筆資料';
header('Location:list.php',true,303);

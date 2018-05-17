<?php
$data=json_decode(file_get_contents('php://input'));
try {
	$db = new PDO('mysql:host=localhost;dbname=test0329;charset=utf8'
		,'root','', array( 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		) );
}catch(PDOException $err) {
	http_response_code(500);
	echo "failed";
	echo $err->getMessage();  //測試用
	exit;
}

$stmt = $db->prepare('insert into moneybook (name,cost) values (?,?)');
$stmt->execute([$data->{"prod"},$data->{"price"}]);
$data->{"id"}=$db->lastInsertId();
http_response_code(201);
header("Content-Type: application/json;charset=UTF-8");
echo json_encode($data);
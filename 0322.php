<?php
if (!isset($_GET['aaa']) || !is_numeric($_GET['aaa']) || !isset($_GET['bbb']) || !is_numeric($_GET['bbb'])){
    echo '參數不正確';    
}else{	
	$a=$_GET['aaa'];
	$b=$_GET['bbb'];
	echo $a+$b;
}
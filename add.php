<?
f (!isset($_GET['prod']) || !isset($_GET['price']) || empty($_GET['price']) || empty($_GET['prod'])){
    echo '參數不正確';
    exit 
}
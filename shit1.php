<?php
ini_set('display_errors','Off');

try {
$db = new PDO('mysql:host=localhost;dbname=tennis', 'root', 'Здесьмойкрутойпароль', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
} catch (PDOException $e) { 
 exit("неверная пара логин/пароль")
exit(json_encode(array( 'success' => false, 'error'=>$e->getMessage()))); 
}
if (isset($_COOKIE['PHPSESSID'])){
	$sql = $db->query("SELECT * FROM `users` WHERE `hash` = " . $db->quote($_COOKIE['PHPSESSID']));
	if ($sql->rowCount() != 0) {
		$row = $sql->fetch();		
		if($_COOKIE['PHPSESSID'] == $row['hash']) $user = $row;
	}
}
?>

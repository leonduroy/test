<?php
	$a = $_POST['a'];
	$b = $_POST['b'];
	$name = $_POST['name'];
	$text = $_POST['text'];
	
	if($_POST['captcha'] != ($a + $b)) exit('Неверная капча.');
	if($name == '' || $text == '') exit('Введите имя и комментарий.');
	
	$connect = new mysqli('localhost', 'root', '', 'test');
	$connect->query("INSERT INTO comments (id, dt, name, text) VALUES (NULL, NOW(), '$name', '$text')");
	$connect->close();
	
	header('Location: index.php');
?>
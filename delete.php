<?php
	$id = $_POST['id'];
	
	$connect = new mysqli('localhost', 'root', '', 'test');
	$connect->query("DELETE FROM comments WHERE id = '$id'");
	$connect->close();
	
	header('Location: index.php');
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Тестирование</title>
    <meta charset=UTF-8"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<? if(isset($_SESSION['message'])){?>
		<div>
			<?= $_SESSION['message'] ?>
		</div>
	<? 
	unset($_SESSION['message']);
	} ?>
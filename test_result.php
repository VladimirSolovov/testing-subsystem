<?php
include '/templates/header.php';
$resjson = file_get_contents('resultate/result.json');
$result = json_decode($resjson, TRUE);
$result = array_values($_POST['userAnswer']);
$corr = array_values($_POST['correct']);
file_put_contents('resultate/result.json', json_encode($result));
$four = count(array_intersect_assoc($result, $corr));
	if($result == $corr){
		echo "Тест успешно пройден!";
		?><p><a href="write_sertificate.php?action=5" method=get">Посмотреть сертификат</a></p>
		<p><a href="index.php">К списку тестов</a></p><?
die();}
	if($four == 3){
		echo "Тест успешно пройден!";
		?><p><a href="write_sertificate.php?action=4" method=get">Посмотреть сертификат</a></p>
		<p><a href="index.php">К списку тестов</a></p><?
die();
	}else{
		echo "Тест не пройден!";}
?><p><a href="index.php">К списку тестов</a></p><?
include '/templates/footer.php';
?>
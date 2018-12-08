<?php
include '/templates/header.php';
if($_GET['action'] == 'logout'){
	unset($_SESSION['username']);
	header('Location: /test/');
}else if($_GET['action'] == 'registration'){
	if(!$_POST['name'] || !$_POST['password']){
	    echo 'Вы не заполнили обязательные поля, поле Имя или Пароль пустое';
 	    die(); 
	}
	$oldjson = file_get_contents('userauth/users.json');
	$jsonarr = json_decode($oldjson, TRUE);
	foreach ($jsonarr as $key => $val) {
		if($val['name'] == $_POST['name']){
			echo "Пользователь с таким именем существует";
			die();
		}
	}
	$jsonarr[] = [
	    'name'      => isset($_POST['name']) ? filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING) : '',
	    'password'  => isset($_POST['password']) ? filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING) : '',
	    'roles'    => 'user'
	];
	file_put_contents('userauth/users.json', json_encode($jsonarr));
	$_SESSION['message'] = 'Регистрация прошла успешно, авторизируйтесь.';
	header('Location: /test/');
}else if($_GET['action'] == 'login'){
	if(!$_POST['name'] || !$_POST['password']){
	    echo 'Вы не заполнили обязательные поля, поле Имя или Пароль пустое';
	   die();
	}
	$jsonlist = file_get_contents('userauth/users.json');
	$users = json_decode($jsonlist, TRUE);

	foreach ($users as $value){
		if($_POST['name'] == $value['name'] && $_POST['password'] == $value['password']){
			$_SESSION['username'] = $_POST['name'];
		    header('Location: /test/');
	   	}
	}
	if(empty($_SESSION['username'])){
		$_SESSION['message'] = 'Такого Пользователя не существует.';
		header('Location: /tests/');
	}
}else{
	echo '404, страница не найдена';
}
?>
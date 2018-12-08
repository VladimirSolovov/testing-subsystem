<?php
	include '/templates/header.php';
if($_GET['action'] == 'add'){
	if(isset($_FILES['file']['name']))
	{
		$name = basename($_FILES['file']['name']);
		$type = strtolower(substr($name, 1+strpos($name, ".")));

		if($type != "json"){
			$_SESSION['message'] ='Файл имеет недопустимое расширение';
		}else{
			$uploaddir = getcwd(). '/tests/' . $name;

			if(file_exists($uploaddir)){
				$_SESSION['message'] = "Файл ".$name." уже существует Выберите другой файл!";
			}else{
				$tmp_name = $_FILES['file']['tmp_name'];
				move_uploaded_file($tmp_name, $uploaddir);
				$_SESSION['message'] = "Файл $name успешно отправлен!";
			}
		}
	}
}
	
?>
	<div> 
		<form enctype="multipart/form-data" action="/tests/admin.php?action=add" method="post">
			<fieldset>
				<legend><strong>Выберите файл для загрузки:</strong></legend>
				<input name="file" type="file" placeholder="Выбрать файл с тестом:"/>
				<button type="submit" value="Отправить файл">Отправить файл</button>
			</fieldset>
			<p><a href="/tests/">Перейти к списку доступных тестов</a></p>
		        </div>
		</form>
	</div>
<?php
	include '/templates/footer.php';
?>
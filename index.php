<?php
include '/templates/header.php';
if(isset($_SESSION['username'])){
	$dir = getcwd() . '/tests/';
	$filelist = scandir($dir, 1);
	function getList($filelist){
		if(!$filelist){
			echo "<h3>Тесты не найдены!</h3>";
		}else{
			echo "<h3>Список тестов</h3>";
			for($i=0; $i<(count($filelist)-2); $i++){
				echo '<li>' . $filelist[$i];
				echo '<a href="view.php?namefile=' . $filelist[$i] . '"> Посмотреть </a>';
				if($_SESSION['username'] == 'admin'){
					echo '<a href="delete.php?namefile=' . $filelist[$i] . '">Удалить</a></li>';
				}				
			}
			echo "</ol>";
		}
	}
	?>
	<div>
		Вы авторизированны как: <?= $_SESSION['username'] ?>
		<a href="/tests/enter.php?action=logout">Выйти</a>
		<?php getList($filelist)?>
		<? if($_SESSION['username'] == 'admin'){ ?>
			<p><a href="admin.php">Загрузить новый тест</a></p>
		<? } ?>
	</div>
<?}else{?>
	<form action="enter.php?action=login" method="post">
	    <div class="row">
	        <label for="name">Логин:</label>
	        <input type="text" class="text" name="name" id="name" />
	    </div>
	    <div class="row">
	        <label for="password">Пароль:</label>
	        <input type="password" class="text" name="password" id="password" />
	    </div>
	    <div class="row">
	        <input type="submit" name="submit" id="btn-submit" value="Авторизоваться" />
	    </div>
	</form>
	<p class="to_reg">Если вы не зарегистрированы в системе, <a href="form_register.php">зарегистрируйтесь</a></p>
<? }
include '/templates/footer.php';
?>
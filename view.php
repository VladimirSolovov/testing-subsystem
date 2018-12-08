<?php
include '/templates/header.php';
	?><form action="test_result.php" method="post">
	<div><?
	$file = file_get_contents(__DIR__.'/tests/'.$_GET['namefile']);
	$data = json_decode($file, true);
		foreach ($data[0] as $key => $quest) {
			?><pre><?
			echo $quest['textQwestion'];?><br><?
		foreach ($quest['answer'] as $k => $variant) {
			echo "<input type=\"hidden\" name=\"correct[" . $key . "]\" value=\"" . $quest['correct'] . "\">";
			echo "<li><input type=\"radio\" name=\"userAnswer[" . $key . "]\" value=\"" . $k . "\" required>$variant</li>";
			}
		}
	?>
	<input type="submit" value="Проверить тест">
	<p><a href="index.php">Выбрать другой тест</a></p>
	</div>
	</form>
<?php
include '/templates/footer.php';
?>
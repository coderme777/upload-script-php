<?php
	if (isset($_POST['upl'])) 
	{//если была отправлена форма
		$blacklist_files = ['.php','.phtml','.php3','.php4','.html','.htm'];
		foreach ($blacklist_files as $search) 
		{//делаем проверку загружаемых файлов, если опасное расширение, то выходим из цикла
			if (preg_match("/$search$/", $_FILES['fil']['name'])) exit('Не безопасное расширение файла.');
		}
	}
	//по желанию можно дополнительно проверять тип файла через fileinfo
	
	if ($_FILES['fil']['size'] < 1024*1000) 
	{//проверка по размеру файла, если слишком большой, то не загружаем с выводом ошибки
	$upload = 'img/'.$_FILES['fil']['name'];//указываем куда загружаем файл
		if (move_uploaded_file($_FILES['fil']['tmp_name'],$upload)) 
		{//используем функцию для перемещения в указанную папку img
			echo 'Успешная загрузка файла';
		} 
	} 
	else 
	{
			exit('Размер Вашего файла превышен.');
	}
?>
<form name='upload' action='upload.php' method='post' enctype='multipart/form-data'>
	<p>
		<input type='file' name='fil'>
	</p>
	<p>
		<input type='submit' name='upl' value='Отправить'>
	</p>		
</form>

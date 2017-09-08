<h3>Список тестов</h3>
<form action="" method="post">
	<input type="text" name="userName" placeholder="Ваше имя:">
	<input type="submit" name="userSub" value="Продолжить">
</form>
<?php
if(isset($_POST['userSub'])){
	if(!empty($_POST['userName'])){
		$n = $_POST['userName'];
		echo 'Привет, '.$_POST['userName'].' выбери тест';
		define('PATH_UPLOAD','tests');
		$files = array();
		$k = 1;
		foreach (glob(PATH_UPLOAD."/*.json") as $filename) {
			$files[$k] = $filename;
			$exp = explode('.',$filename);
			$ext = explode('/',$exp[0]);
			if(!isset($k)){
			    return $k;
            }
            if(!isset($n)){
                return $n;
            }
			?>
			<ul>
				<li><a href="test.php?&act=test&fileid=<?=$k?>&name=<?=$n?>"><?= $ext[1] ?></a></li>
			</ul>
			<?php
			$k++;
		}
	}else{
		echo 'Вы не ввели имя!';
	}
}


?>
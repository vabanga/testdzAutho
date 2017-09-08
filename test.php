<h3>Тесты</h3>

<?php
if(isset($_GET["fileid"])) {

	define('PATH_UPLOAD','tests');
	$files = array();
	$k = 1;
	foreach (glob(PATH_UPLOAD."/*.json") as $filename) {
		$files[$k] = $filename;
		$k++;
	}
	if (file_exists($files[$_GET['fileid']])) {
		$cont = file_get_contents($files[$_GET['fileid']]);
		$tests = json_decode($cont,true);
		$v = [];

		?>
		<form action="" method="post">
			<fieldset>
			<legend><?= $tests[0]['title'] ?></legend>
                <?php
                foreach ($tests as $v) {
                    foreach ($v['answers'] as $ot) {
                        ?>
                        <label>
                            <input type="radio" name="q1" value="<?=$ot?>"><?php echo $ot; ?>
                        </label>
                        <?php
                    }
                }
				if(!empty($_POST['q1'])){
					if($_POST['q1'] == $v['right']){
						$nt = $_GET['name'];
                        header("Location: serf.php?&test=true&value=Зачёт&name=$nt");
					}else{
                        $nt = $_GET['name'];
                        header("Location: serf.php?&test=false&value=Не зачёт&name=$nt");
					}
				}
				?>
			</fieldset>
			<input type="submit" name="vop1" value="Ответить">
			<input type="submit" name="rTest" value="Назад">
			<?php
			if(!empty($_POST['rTest'])){
				header('Location: index.php');
			}
			?>
		</form>
		<?php

	} else {
		header("HTTP/1.0 404 Not Found");
		echo '404 Not Found';
	}

}else{
	?>
	<p style="color:red">Неверные параметры</p>
	<?php
}
?>
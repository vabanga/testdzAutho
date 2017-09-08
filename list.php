<h3>Список тестов</h3>
<?php
require_once 'core/core.php';
$_POST['userName'] = $_SESSION['user']['name'];
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
    <form action="" method="POST">
        <input type="submit" name="<?=$k?>" value="Удалить тест">
    </form>
    <?php
    if(!empty($_POST[$k])){
        unlink(__DIR__.'/'.$files[$k]);
        header("Location: list.php");
        die;
    }
    $k++;
}
if($_SESSION['user']['name'] == 'Гость'){
}else {
    ?>
    <br><a href="downloadTest.php">Добавить тест</a><?php
}
?>
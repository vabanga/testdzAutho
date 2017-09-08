<?php

if(!empty($_FILES['userfile'])){
	$des = 'tests/';
	$file = $_FILES['userfile'];
    if(!isset($file)){
        return $file;
    }
	define('PATH_UPLOAD','tests');
	$ext = explode(".", $file['name']);
	if(!isset($ext)){
	    return $ext;
    }
	$uploadfile = $des . basename($_FILES['userfile']['name']);
	if(!isset($uploadfile)){
	    return $uploadfile;
    }
	if($ext[1]=='json'){
		move_uploaded_file($file["tmp_name"],$uploadfile);
        header('Location: list.php');
	}else{
		echo"Файл НЕ отправлен";
	}
}

if(!isset($_GET['act'])){

}else{
	if(!empty($_GET['act']=='admin')){
		include_once 'downloadTest.php';
	}
	if(!empty($_GET['act']=='list')){
		include_once 'list.php';
	}
	if(empty($_GET['act']=='test')){
		include_once 'test.php';
	}

}

if(!empty($_POST['naGlav'])){
	header('Location: addTestAndList.php');
}
if(!empty($_POST['Act'])){
	header('Location: downloadTest.php');
}
if(!empty($_POST['List'])){
	header('Location: list.php');
}
?>
<br>
<form action="action.php" method="post"><input type="submit" value="Назад" name="Act"></form>
<form action="action.php" method="post"><input type="submit" value="Список тестов" name="List"></form>
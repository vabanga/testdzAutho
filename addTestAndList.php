<?php
require_once 'core/core.php';
if (!isAuthorized()) {
    redirect('login');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
<a href="list.php">Список тестов</a><br/>
<a href="logout.php">Выход</a><br/>

</body>
</html>
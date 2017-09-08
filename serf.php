<?php



if($_GET['test'] == true) {
	$im = imagecreatetruecolor(500, 200);
	putenv('GDFONTPATH=' . realpath('.'));
	$red = imagecolorallocate($im, 0xFF, 0x00, 0x00);
	$black = imagecolorallocate($im, 0x00, 0x00, 0x00);
	$white = imagecolorallocate($im, 255, 255, 255);

	imagefilledrectangle($im, 0, 0, 299, 99, $black);

	$font_file = __DIR__ . '/FONT.TTF';

	imagefttext($im, 13, 0, 200, 25, $white, $font_file, 'Сертификат');
	imagefttext($im, 13, 0, 20, 80, $white, $font_file, 'Имя: ' . $_GET['name']);
	imagefttext($im, 13, 0, 20, 120, $white, $font_file, 'Оценка: '.$_GET['value']);

	header('Content-Type: image/png');

	imagepng($im);
	imagedestroy($im);
}else{
	$im = imagecreatetruecolor(500, 200);
	putenv('GDFONTPATH=' . realpath('.'));
	$red = imagecolorallocate($im, 0xFF, 0x00, 0x00);
	$black = imagecolorallocate($im, 0x00, 0x00, 0x00);
	$white = imagecolorallocate($im, 255, 255, 255);

	imagefilledrectangle($im, 0, 0, 299, 99, $black);

	$font_file = __DIR__ . '/FONT.TTF';

	imagefttext($im, 13, 0, 200, 25, $white, $font_file, 'Сертификат');
	imagefttext($im, 13, 0, 20, 80, $white, $font_file, 'Имя: ' . $_GET['name']);
	imagefttext($im, 13, 0, 20, 120, $white, $font_file, 'Оценка: '.$_GET['value']);

	header('Content-Type: image/png');

	imagepng($im);
	imagedestroy($im);
}
?>
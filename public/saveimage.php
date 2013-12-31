<?php

$photoPath = 'pics/';
$date = new \DateTime();

$file = $photoPath . $date->format('YmdHis') . '.png';

if(isset($_POST['img'])){

	$img = $_POST['img'];
	
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$success = file_put_contents($file, $data);
	$success ? $file : 'Unable to save the file.';
	echo json_encode($success);
	exit;
	
}else if(isset($_FILES['file'])){
	$success = file_put_contents($file, file_get_contents($_FILES['file']['tmp_name']) );
	$success ? $file : 'Unable to save the file.';
	header("Location: /");
}

<?php

if(isset($_POST['img'])){

	$img = $_POST['img'];

	$photoPath = 'pics/';
	$date = new \DateTime();

	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = $photoPath . $date->format('YmdHis') . '.png';
	$success = file_put_contents($file, $data);
	$success ? $file : 'Unable to save the file.';
	echo json_encode($success);
	exit;
}
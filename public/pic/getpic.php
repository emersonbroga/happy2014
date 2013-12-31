<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    function echoHeaders() {
        header("Cache-Control: private, max-age=10800, pre-check=10800");
        header("Pragma: private");
        header("Expires: " . date(DATE_RFC822, strtotime("2 day")));
        header('Content-type: image/jpg');
    }

    function resizeImage($originalImage, $toWidth, $toHeight) {
        $toWidth = intval($toWidth);
        $toHeight = intval($toHeight);

        list($width, $height) = getimagesize($originalImage); 

        if ((!$toWidth && !$toHeight) || ($toWidth >= $width && $toHeight >= $height)) {
            echoHeaders();
            echo file_get_contents($originalImage);
            exit;
        }

        $xscale = $toWidth ? $width / $toWidth : 0;
        $yscale = $toHeight ? $height / $toHeight : 0;

        if ($yscale > $xscale) { 
            $new_width = round($width / $yscale); 
            $new_height = round($toHeight); 
        } 
        else { 
            $new_width = round($toWidth); 
            $new_height = round($height / $xscale); 
        } 

        $imgSize = getimagesize($originalImage); 
        switch($imgSize['mime']) {
            case 'image/jpg':
            case 'image/jpeg':
               $imageTmp = imagecreatefromjpeg($originalImage);
            break;
            case 'image/gif':
               $imageTmp = imagecreatefromgif($originalImage);
               break;
            case 'image/png':
               $imageTmp = imagecreatefrompng($originalImage); 
               break;
         }

        $imageResized = imagecreatetruecolor($new_width, $new_height); 
        imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 

        echoHeaders();
        imagejpeg($imageResized, NULL, 90);

    }

    if (isset($_GET['q'])) {

        $q = explode('/', $_GET['q'], 3);

        if (count($q) === 1) {
            $src = '../pics/' . $q[0];
            $w = null;
            $h = null;
        } else {
           $src = '../pics/' . $q[2];
           list($w, $h) = explode('x', $q[1]); 
        }
        
        if (!file_exists($src)) {
            header('HTTP/1.1 404 Not Found');
            exit;
        }

        resizeImage($src, $w, $h);
        exit;
    }

?>

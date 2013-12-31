<?php

    $files = scandir('pics');
    $files = array_slice($files, 2);
    //shuffle($files);
    $files = array_reverse($files);
    $files = array_slice($files, 0, 25);

    $pics = array();
    foreach ($files as $f) {
        $p = array();

        $p['src'] = $f;
        $p['id'] = preg_replace('/[^\d]/', '', $f);

        $info = getimagesize('pics/' . $p['src']);
        if($info){
            $p['w'] = $info[0];
            $p['h'] = $info[1];

            $pics[] = $p;
        }
    }

    echo json_encode($pics);
    exit;

?>
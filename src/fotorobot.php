<?php
spl_autoload_register(function($className) {
    require_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $className . '.php');
});

$uploaddir = "/images/";
$keinfoto = DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . "noimage.jpg";
if(isset($_FILES['ichFile'])) {
    $filename =  array_keys($_FILES)[0];
    $shirGross = "115";
    $visGross = "115";
    $copyOrUpload = "upload";
    $img = new Fotorobot($copyOrUpload,$filename,$shirGross,$visGross,$uploaddir,$keinfoto);
}
elseif(isset($_FILES['beispiel'])) {
    $filename =  array_keys($_FILES)[0];
    $shirGross = "600";
    $visGross = "400";
    $copyOrUpload = "copy";
    $imgGross = new Fotorobot($copyOrUpload,$filename,$shirGross,$visGross,$uploaddir,$keinfoto);
    $shirGross = "300";
    $visGross = "200";
    $copyOrUpload = "upload";
    $imgKlein = new Fotorobot($copyOrUpload,$filename,$shirGross,$visGross,$uploaddir,$keinfoto);
    $beschreibung = $_POST['beschreibung'];
    if($beschreibung == ''){$beschreibung = 'Keine Beschreibung';}
    file_put_contents($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR . 'content' . DIRECTORY_SEPARATOR . 'block_8.txt', $imgGross->fotosname.PHP_EOL.$imgKlein->fotosname.PHP_EOL.$beschreibung.PHP_EOL, FILE_APPEND | LOCK_EX);
    header( 'Location: '.$_SERVER['HTTP_REFERER'] );
}
elseif(isset($_POST['del'])) {
    $del = $_POST['del'];
    $blockDel = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'content' . DIRECTORY_SEPARATOR . 'block_8.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach($blockDel as $key => $value) {
        if($value == $del) {
            unlink($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $blockDel[$key]);
            unlink($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $blockDel[$key+1]);
            unset($blockDel[$key+2], $blockDel[$key+1], $blockDel[$key]);
        }
    }
    $str = implode(PHP_EOL, $blockDel);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'content' . DIRECTORY_SEPARATOR . 'block_8.txt', $str.PHP_EOL, LOCK_EX);
    header( 'Location: '.$_SERVER['HTTP_REFERER'] );
}
<?php
if(isset($_POST['nachweis'])) {
    $nachweis = mb_strtolower($_POST['nachweis']);
    $NACHWEIS = mb_strtoupper($nachweis);

    $prozent = $_POST['prozent'];
    if($prozent > 100) {$prozent = 100;}
    $file = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "js" . DIRECTORY_SEPARATOR . "nachtrag.js";
    $value = "var elem = document.getElementById('$nachweis');
        document.getElementById('$nachweis').style.width = '$prozent%';
        elem.addEventListener(\"transitionend\", function() {
        document.getElementById('$nachweis').innerHTML = \"$NACHWEIS\";
    });
    /*Erganzen*/";
    $content = file_get_contents($file);
    $content = str_replace ('/*Erganzen*/', $value, $content); 
    file_put_contents($file, $content, LOCK_EX);
    file_put_contents('content' . DIRECTORY_SEPARATOR . 'block_4.txt', $prozent.PHP_EOL.$nachweis.PHP_EOL, FILE_APPEND | LOCK_EX);
}
if(isset($_POST['skillDel'])) {
    $skillDel = $_POST['skillDel'];
    $block_4 = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'content' . DIRECTORY_SEPARATOR . 'block_4.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach($block_4 as $key => $value) {
        if($value == $skillDel) {
            unset($block_4[$key-1], $block_4[$key]);
        }
    }
    $str = implode(PHP_EOL, $block_4);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'content' . DIRECTORY_SEPARATOR . 'block_4.txt', $str.PHP_EOL, LOCK_EX);
    $block_4 = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'nachtrag.js', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach($block_4 as $key => $value) {
        if($value == "    var elem = document.getElementById('$skillDel');") {
            unset($block_4[$key], $block_4[$key+1], $block_4[$key+2], $block_4[$key+3], $block_4[$key+4]);
        }
    }
    $str = implode(PHP_EOL, $block_4);
    file_put_contents('js' . DIRECTORY_SEPARATOR . 'nachtrag.js', $str.PHP_EOL, LOCK_EX);
}
$header = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "header.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$block_1 = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "block_1.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$block_2 = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "block_2.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$block_3 = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "block_3.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$block_4 = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "block_4.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$block_5 = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "block_5.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$block_5a = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "block_5a.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$erfahrung = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "erfahrung.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$block_6 = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "block_6.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$block_7 = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "block_7.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$block_8 = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "block_8.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
function fileSuch($dir, $name) {
    $scandir = scandir($dir.'/');
    foreach($scandir as $value){
        $fileName = pathinfo($value, PATHINFO_FILENAME);
        if($fileName == $name) {
            return $value;
        }
    }
}
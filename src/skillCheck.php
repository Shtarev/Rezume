<?php
if(isset($_GET['skillCheck'])) {
    $skillCheck = $_GET['skillCheck'];
    $arr = file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'content' . DIRECTORY_SEPARATOR . 'block_4.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $res = 'ok';
    if(in_array($skillCheck, $arr)) {
        $res = mb_strtoupper($skillCheck);
    }
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}
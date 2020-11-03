<?php
if(isset($_POST['pass'])) {
    $newPass = $_POST['pass'];
    $altPass = $_POST['altPass'];
    $configStr = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/src/config.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $str = str_replace($altPass, $newPass, $configStr);
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/src/config.php', $str, LOCK_EX);
    header( 'Location: '.$_SERVER['HTTP_REFERER'] );
}
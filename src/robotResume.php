<?php
$uploaddir='../file/';
$name = $_FILES['resume']['name'];
$i = strrpos($name,'.');
$ext = substr($name,$i);  
$name = 'resume'.$ext;
$scandir = scandir($uploaddir);
foreach($scandir as $key=>$value){
    $fileName = pathinfo($value, PATHINFO_FILENAME);
    if($fileName == 'resume') {
        unlink($uploaddir.$value);
    }
}  
if(move_uploaded_file($_FILES['resume']['tmp_name'], $uploaddir . $name)) {
    echo 'Файл загружен';
}
else {
    echo 'На сервере возникла ошибка';
} 
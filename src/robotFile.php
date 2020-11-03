<?php
$inputName = $_POST['id'];
$uploaddir='../file/';
$name = $_FILES['resume']['name'];
$i = strrpos($name,'.');  
$ext = substr($name,$i);  
$name = uniqid().$ext;
if(move_uploaded_file($_FILES['resume']['tmp_name'], $uploaddir . $name)) {
    echo 'Файл загружен';
}
else {
    echo 'На сервере возникла ошибка';
} 
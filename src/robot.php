<?php
if(isset($_POST['id']) && $_POST['id'] == 'resume') {
$inputName = $_POST['id'];
$uploaddir='../file/';
$_FILES['resume']['name']; 
    $i = strrpos($name,'.');  
    $ext = substr($name,$i);  
$name = uniqid().$ext;
move_uploaded_file($_FILES['resume']['tmp_name'], $uploaddir . $name);
    echo "Файл загружен";  
 }
 else {
    $id = $_POST['id'];
    $file = "../content/$id.txt";
    $value = $_POST['value'];
    $result = file_put_contents($file, $value, LOCK_EX);
    echo $result;
}
<?php
$id = $_POST['id'];
$file = "../content/$id.txt";
$value = $_POST['value'];
$content = file_get_contents($file);
$title = strtok($content, PHP_EOL);
$res = $title.PHP_EOL.$value.PHP_EOL;
$result = file_put_contents($file, $res, LOCK_EX);

if(is_numeric($result)) {
    echo '<p class="text-success">Данные внесены</p>';
}
else {
    echo '<p class="text-danger">На сервере возникла ошибка:</p>';
}

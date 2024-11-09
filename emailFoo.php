<?php
include('src' . DIRECTORY_SEPARATOR . 'config.php');

$data = json_decode(file_get_contents('php://input'), true);

if(mail($email,"Resume Nachricht","Absender Name: " . $data['absenderName']."\nE-Mail des Absender: " . $data['absenderEmail'] . "\nNachricht:\n" . $data['absenderMessage'],"Content-type:text/plain; Charset=UTF-8\r\n")) {
    echo 1;
}
else{
    echo 0;
}

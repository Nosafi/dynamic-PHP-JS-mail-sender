<?php
include 'mail.php';

$email = $_POST['email'];
$email_from = 'zland@bntu.by';
$subject = "Тема письма";
$message = '<h1>Здравствуйте!</h1>...';
$from = "From: zland@bntu.by";
$url = "https://onepage/";

$file_1 = "/../files/resume.pdf";
$file_2 = "/../files/opoko.pdf";
$file_3 = "/../files/sakh.pdf";


$mail = new Mail;
$mail->from($email_from, $email_from);
$mail->to($email, $email);
$mail->subject = $subject;


// Добавление  файлов к письму.
$ch_1 = $_POST['ch_1'];
$ch_2 = $_POST['ch_2'];
$ch_3 = $_POST['ch_3'];

if($ch_1 == "on") 
    $mail->addFile(__DIR__ . $file_1);
if($ch_2 == "on") 
    $mail->addFile(__DIR__ . $file_2);
if($ch_3 == "on") 
    $mail->addFile(__DIR__ . $file_3);

$mail->body = $message;

try {
    $mail->send();
} catch(Exception $e) {
    echo "При отправке сообщения возникли ошибки";
}

//Connect to BD
$date = date('Y-m-d');

$link = mysqli_connect('127.0.0.1', 'root', 'root', 'onepage_bd');

$sql = "INSERT INTO send_history SET addres ='" . $email . "', date ='" . $date ."'";
$result = mysqli_query($link, $sql);

if ($result == false) {
    print("Произошла ошибка при выполнении запроса");
}

// return to main
 header ('Location: ' . $url);

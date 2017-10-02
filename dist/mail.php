<?php 

include "class.phpmailer.php";// подключаем класс

$message = "Регистрация Фестиваль скорости RTR 2017: <br>";
$message .= "Имя: {$_POST['name']} <br>";
$message .= "Телефон: {$_POST['phone']} <br>";
$message .= "Email: {$_POST['email']} <br>";
$message .= "Марка авто: {$_POST['mark']} <br>";
$message .= "Номинация: {$_POST['nom']} <br>";
$message .= "Почему ты считаешь: {$_POST['why']} <br>";
$message .= "Комментарий: {$_POST['comment']} <br>";


$mail = new PHPMailer();
$mail->From = 'tuningshow@rtr.ua';
$mail->FromName = 'Фестиваль скорости RTR 2017';
$mail->AddAddress("litvin.andriy91@gmail.com"); // имейл
$mail->IsHTML(true);
$mail->Subject = "Фестиваль скорости"; // тема письма

if(isset($_FILES)) {
	$mail->AddAttachment($_FILES['photo_1']['tmp_name'], $_FILES['photo_1']['name']);
	$mail->AddAttachment($_FILES['photo_2']['tmp_name'], $_FILES['photo_2']['name']);
	$mail->AddAttachment($_FILES['photo_3']['tmp_name'], $_FILES['photo_3']['name']);

}

$mail->Body = $message;



if(!$mail->send()) {
    echo '<h2>Message could not be sent.</h2>';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
header('Location: /thanks.html');
?>
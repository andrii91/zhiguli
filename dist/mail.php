<?php 

include "class.phpmailer.php";// подключаем класс

$message = "Боевая класика Жигули всегда <br>";
$message .= "Имя: {$_POST['name']} <br>";
$message .= "Авто/стенд: {$_POST['stend']} <br>";
$message .= "Авто / Марка / Модель: {$_POST['mark']} <br>";
$message .= "Телефон: {$_POST['phone']} <br>";
$message .= "Email: {$_POST['email']} <br>";
$message .= "Почему твой Жигуль: {$_POST['why']} <br>";
$message .= "Комментарий: {$_POST['comment']} <br>";


$mail = new PHPMailer();
$mail->From = 'vaz.expo@yandex.ru';
$mail->FromName = 'Боевая класика "Жигули всегда"';
$mail->AddAddress("litvin.andriy91@gmail.com"); // имейл
$mail->IsHTML(true);
$mail->Subject = "ЗАЯВКА НА УЧАСТИЕ "; // тема письма

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
header('Location: thanks.html');
?>
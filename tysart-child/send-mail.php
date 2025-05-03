<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Подключаем PHPMailer, указывая абсолютный путь
require __DIR__ . '/phpmailer/Exception.php';
require __DIR__ . '/phpmailer/PHPMailer.php';
require __DIR__ . '/phpmailer/SMTP.php';

// Логирование в файл
file_put_contents(__DIR__ . '/form-debug.txt', "--- Новый запрос: " . date("Y-m-d H:i:s") . PHP_EOL, FILE_APPEND);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    file_put_contents(__DIR__ . '/form-debug.txt', "POST:\n" . print_r($_POST, true), FILE_APPEND);

    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']), ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8');

    if (!$email) {
        echo '<div class="message error">Пожалуйста, введите корректный email.</div>';
        exit;
    }

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tyschencko@gmail.com';
        $mail->Password = 'iymcgczcdjgzfpvd'; // ВНИМАНИЕ: замените или защитите
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('tyschencko@gmail.com', 'Tysart Site');
        $mail->addAddress('tysart@arttistfoto.ru');
        $mail->Subject = 'Новое сообщение с сайта';
        $mail->Body = "Имя: $name\nEmail: $email\nТелефон: $phone\nСообщение:\n$message";

        $mail->send();
        file_put_contents(__DIR__ . '/form-debug.txt', "Отправка письма: УСПЕШНО\n", FILE_APPEND);
        echo '<div class="message success">Спасибо! Я свяжусь с вами в течение дня.</div>';
    } catch (Exception $e) {
        $error = "Ошибка PHPMailer: " . $mail->ErrorInfo;
        file_put_contents(__DIR__ . '/form-debug.txt', $error . "\n", FILE_APPEND);
        echo '<div class="message error">Ошибка при отправке. Попробуйте позже.</div>';
    }
} else {
    file_put_contents(__DIR__ . '/form-debug.txt', "Ошибка: не POST-запрос\n", FILE_APPEND);
    echo '<div class="message error">Неверный метод запроса.</div>';
}
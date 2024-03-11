<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

require 'index.php'; // Include the autoloader

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['date']) && isset($_POST['recipient'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $recipient = $_POST['recipient']; // Get recipient email(s) from form input

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kodiokeke0@gmail.com';
        $mail->Password = 'innipsubwvacponl';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('kodiokeke0@gmail.com');
        $mail->addAddress('kodiokeke0@gmail.com');

        // Split recipient emails if multiple emails are provided
        $recipients = explode(',', $recipient);
        foreach ($recipients as $recipient) {
            $mail->addAddress(trim($recipient)); // Trim whitespace and add each recipient separately
        }

        $mail->isHTML(true);
        $mail->Subject = 'Interview Schedule';
        $mail->Body = "
            <h2>Interview Schedule</h2>
            <table border='1'>
                <tr>
                    <th>Candidate Name</th>
                    <th>Candidate Email</th>
                    <th>Interview Date</th>
                </tr>
                <tr>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$date</td>
                </tr>
            </table>
        ";

        if ($mail->send()) {
            echo 'Email sent successfully';
        } else {
            echo 'Error: ' . $mail->ErrorInfo;
        }
    } else {
        echo 'Please fill out all the fields.';
    }
} else {
    echo 'Invalid request';
}
?>

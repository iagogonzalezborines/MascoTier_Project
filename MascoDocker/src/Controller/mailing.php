
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once '../DataBase/dataBase.php';
require_once '../Methods/formFilters.php';
require_once '../Methods/PHPMailer.php';
require_once '../Methods/PHPMailerException.php';
require_once '../Methods/SMTP.php';


// In controller page there should be a button to submit an email which will execute this code
if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SESSION['email'] != null) {
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    $config = parse_ini_file('config.ini', true);

    try {
        // Server settings
        $mail->SMTPDebug = 0; // Set to 2 for debugging information
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Specify your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com'; // Your SMTP username
        $mail->Password = $config['phpmailer']['password']; // Your SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender and recipient
        $mail->setFrom('sender@example.com', 'Sender Name');
        $mail->addAddress($_SESSION['email'], 'Recipient Name');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Test Email';
        $mail->Body = 'This is a test email';

        // Send the email
        $mail->send();
        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
    }
}
    

?>
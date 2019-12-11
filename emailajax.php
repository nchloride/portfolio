<?php
$email = $_POST['email'];
$usermessage = $_POST['message']; 


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
  //  $mail->SMTPDebug = 1;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'noelcarlo.lopez@gmail.com';                     // SMTP username
    $mail->Password   = '0915975384625Ca';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('noelcarlo.lopez@gmail.com', 'NChLorideTV');
    $mail->addAddress('clankz39@gmail.com', 'Carlo Lopez');     // Add a recipientf


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $email;
    $mail->Body    = $usermessage;
    

    $mail->send();
    echo 'Message has been sent';
    $mail ->ClearAllRecipients();
    $mail ->Subject = "Hello this is Noel";
    $mail ->Body = "This is just a verification that you send an email";
    $mail ->AddAddress($email);
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
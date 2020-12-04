
 <?php
 session_start();
include("../inc/config.php");

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
if(isset($_GET['email']))
{
    $email=$_GET['email'];
    
    $rand=rand(1000,10000);
    $_SESSION['password']=$rand;
    $_SESSION['cemail']=$email;
    $mail = new PHPMailer(true);

    try 
    {
                //Server settings
        $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'no7693581@gmail.com';                     // SMTP username
        $mail->Password   = 'noreplydemo533';                               // SMTP password
        $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
        $mail->setFrom('no7693581@gmail.com', 'HAHAPAL TV');
                //$mail->addAddress('aliatifali63@gmail.com');               // Name is optional
        $mail->addAddress($email);   
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                // Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Confirmation';
        $mail->Body    = 'Your Confirmation code is </b>'.$rand;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        header('location: ../codeconfirm.php');
    } 
    catch (Exception $e) 
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    } 
    
}
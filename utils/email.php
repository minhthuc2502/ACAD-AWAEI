<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


 /**
   * send_alert_email
   *
   * send alert email to client
   * 
   * $to_email      : client's email
   */
function send_alert_email($to_email) {
  $subject = 'The Castle - Température Alerte';
  $template = file_get_contents(dirname(__FILE__) . '/alert-email.php');

  $search = array('%REPLACE_FIRSTNAME%', '%REPLACE_ROOM%', '%REPLACE_TEMP%');
  $replace = get_data_for_alerte_email();
  $message = str_replace($search,$replace,$template);

  // To send HTML mail, the Content-type header must be set
  $headers[] = 'MIME-Version: 1.0';
  $headers[] .= 'Content-type: text/html; charset=iso-8859-1' . '\n';
  mail($to_email, $subject, $message, implode("\r\n", $headers));
}

 /**
   * send_noti_email
   *
   * send noti email to client
   * 
   * $to_email      : client's email
   */
function send_noti_email($to_email) {
  // $subject = 'The Castle - Notification';
  // $message = file_get_contents(dirname(__FILE__) . '/noti-email.html');

  // // To send HTML mail, the Content-type header must be set
  // $headers[] = 'MIME-Version: 1.0';
  // $headers[] .= 'Content-type: text/html; charset=iso-8859-1';
  // mail($to_email, $subject, $message, implode("\r\n", $headers));

  // Load Composer's autoloader
  require_once dirname(__FILE__) . '/../vendor/autoload.php';
  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'thecastle1997.blois@gmail.com';                     // SMTP username
    $mail->Password   = 'TheCastle1997*';                               // SMTP password
    // $mail->Username   = 'laminhduc07041@gmail.com';                     // SMTP username
    // $mail->Password   = 'Laminhduc1997*';                               // SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('thecastle1997.blois@gmail.com', 'The Castle 1997');
    $mail->addAddress('minhthuc2502@gmail.com');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'The Castle - Notification';
    $mail->Body    = file_get_contents(dirname(__FILE__) . '/noti-email.html');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-1.jpg', 'work1');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-2.jpg', 'work2');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-3.jpg', 'work3');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-4.jpg', 'work4');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-5.jpg', 'work5');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-6.jpg', 'work6');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-7.jpg', 'work7');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-8.jpg', 'work8');

    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

function get_data_for_alerte_email() {
  return array('LA', 'salle de bain', '37');
}
?>
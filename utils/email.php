<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 /**
   * init_email
   *
   * initialize email function
   * 
   * return $mail variable
   */
function init_email() {
  // Load Composer's autoloader
  require_once dirname(__FILE__) . '/../vendor/autoload.php';
  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug  = SMTP::DEBUG_OFF;                        // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'thecastle1997.blois@gmail.com';        // SMTP username
    $mail->Password   = 'TheCastle1997*';                       // SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
    $mail->CharSet    = 'UTF-8';
    $mail->Encoding   = 'base64';

    $mail->setFrom('thecastle1997.blois@gmail.com', 'The Castle 1997');

    echo 'Mail has been initialized';
  } catch (Exception $e) {
      echo "Mail could not be initialized. Mailer Error: {$mail->ErrorInfo}";
  }

  return $mail;
}


 /**
   * send_alert_email
   *
   * send alert email to client
   * 
   * $to_email      : client's email
   */
function send_alert_email($to_email) {
  $mail = init_email();

  try {
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'The Castle - Température Alerte';

    $template     = file_get_contents(dirname(__FILE__) . '/alert-email.html');
    $search       = array('%REPLACE_FIRSTNAME%', '%REPLACE_ROOM%', '%REPLACE_TEMP%');
    $replace      = get_data_for_alerte_email();
    $mail->Body   = str_replace($search,$replace,$template);

    $mail->addAddress($to_email);     // Add a recipient

    $mail->send();

    echo "Mail is sent";
  }  catch (Exception $e) {
    echo "Mail could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

 /**
   * send_noti_email
   *
   * send noti email to client
   * 
   * $to_email      : client's email
   */
function send_noti_email($to_email) {
  $mail = init_email();

  try {
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'The Castle - Notification';

    $template     = file_get_contents(dirname(__FILE__) . '/noti-email.html');
    $search       = array('%TEMP_SALON%', '%TEMP_CHAMBRE1%', '%TEMP_CHAMBRE2%', '%TEMP_CUISINE%', '%TEMP_BAIN%', '%TEMP_MANGER%');
    $replace      = get_data_for_noti_email();
    $mail->Body   = str_replace($search,$replace,$template);

    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-1.jpg', 'work1');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-2.jpg', 'work2');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-3.jpg', 'work3');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-5.jpg', 'work5');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-6.jpg', 'work6');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/images/work-7.jpg', 'work7');

    $mail->addAddress($to_email);     // Add a recipient

    $mail->send();

    echo "Mail is sent";
  }  catch (Exception $e) {
    echo "Mail could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

function get_data_for_alerte_email() {
  return array('LA', 'salle de bain', '37');
}

function get_data_for_noti_email() {
  return array('07', '04', '97', '09', '10', '97');
}


if (isset($_POST["email_function"])) {
  $type = $_POST["type"];
  $to_email = $_POST["addr_email"];

  if (!$to_email) {
    $to_email = "laminhduc0704@gmail.com";
  }

  switch ($type) {
    case "noti":
      send_noti_email($to_email);
      break;
    case "alert":
      send_alert_email($to_email);
      break;
    default:
      echo "Choose something, idiot";
  }
}
?>
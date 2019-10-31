<?php
 /**
   * send_alert_email
   *
   * send alert email to client
   * 
   * $to_email      : client's email
   */
function send_alert_email($to_email) {
    $subject = 'The Castle - Température Alerte';
    $message = file_get_contents(dirname(__FILE__) . '/alert-email.html');

    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    mail($to_email, $subject, $message, implode("\r\n", $headers));
}

?>
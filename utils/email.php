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
  $subject = 'The Castle - Notification';
  $message = file_get_contents(dirname(__FILE__) . '/alert-email.php');

  // To send HTML mail, the Content-type header must be set
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=iso-8859-1';
  mail($to_email, $subject, $message, implode("\r\n", $headers));
}

function get_data_for_alerte_email() {
  return array('LA', 'salle de bain', '37');
}
?>
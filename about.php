<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="img/icon.png">
        <link rel="stylesheet" href="mainstyle.css">
        <title>The Castle - About</title>
    </head>
    <body>
    <?php
    function read_bits($ip,$port,$debut,$nbits)
    {
        //TODO: change line below to adapt your OS system
        /* For Ubuntu */
        require_once dirname(__FILE__) . '/phpmodbus-master/Phpmodbus/ModbusMaster.php';
        /* For Window */
        // require_once dirname(__FILE__) . '\phpmodbus-master\Phpmodbus\ModbusMaster.php';

        $modbus = new ModbusMaster($ip,"TCP",$port);
        $recData = $modbus->readCoils(1,$debut, $nbits);
        return $recData;
    }

    function send_email()
    {
        require_once dirname(__FILE__) . '/utils/email.php';
        // $to_email = 'minh.la@insa-cvl.fr';
        $to_email = 'laminhduc0704@gmail.com';
        // $to_email = 'duc.bui@insa-cvl.fr';
        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        //mail($to_email,$subject,$message, implode("\r\n", $headers));
        send_alert_email($to_email);
    }

    if (isset($_POST["test"])){
        $data = read_bits("192.168.001.100",502,45,100);
        echo PhpType::bytes2string($data);
    }
    if (isset($_POST["email"])) {
        send_email();
    }
    ?>
    <form method="POST" action="about.php">

    <!-- Header -->
        <div>
            <header id="header" class="alt">
                <div class="logo"><a href="index.php">THE CASTLE <span>1997</span></a><div>
            </header>
        </div>
        <div class="main-content">
            <header>
                
                <a href = "index.php">Home</a>
                <a href = "about.php">About</a>
                <a href = "login.php">Se Connecter</a>
            </header>
            <img class="portrait" src="img/logo.jpg">
            <p>This site was created by Minh Duc LA, Minh Thuc PHAM. It uses data from an automate using MOD BUS</p>
            <input type="submit" name="test" value="test">
            <input type="submit" name="email" value="email">
        </div>  
    </body>

</html>
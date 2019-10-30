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
        $to_email = 'minh.la@insa-cvl.fr';
        // $to_email = 'duc.bui@insa-cvl.fr';
        $subject = 'Testing PHP Mail1';
        $message = 'This mail is sent using the PHP mail function';
        mail($to_email,$subject,$message);
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
    <div class="main-content">
        <header>
            <h1>Projet Web Static</h1>  
            
            <a href = "index.php">Home</a>
            <a href = "about.php">About</a>
            <a href = "help.php">Help</a>
        </header>
        <img class="portrait" src="img/logo.jpg">
        <p>This site was created by Minh Duc LA, Minh Thuc PHAM. It uses data from an automate using MOD BUS</p>
        <input type="submit" name="test" value="test">
        <input type="submit" name="email" value="email">
    </div>  
    </body>

</html>
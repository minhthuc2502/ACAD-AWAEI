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
        require_once './phpmodbus-master/Phpmodbus/ModbusMaster.php';

        $modbus = new ModbusMaster($ip,"TCP",$port);
        $recData = $modbus->readCoils(1,$debut, $nbits);
        return $recData;
    }

    function send_email()
    {
        require_once './utils/email.php';
        // $to_email = 'minh.la@insa-cvl.fr';
        $to_email = 'laminhduc0704@gmail.com';
        // $to_email = 'duc.bui@insa-cvl.fr';
        // $to_email = 'minhthuc2502@gmail.com';
        
        //mail($to_email,$subject,$message, implode("\r\n", $headers));
        send_alert_email($to_email);
    }

    if (isset($_POST["test"])){
        $data = read_bits("192.168.001.100",502,45,100);
        echo PhpType::bytes2string($data);
    }
    if (isset($_POST["alerte_email"])) {
        send_email();
    }

    if (isset($_POST["noti_email"])) {
        require_once './utils/email.php';
        send_noti_email('laminhduc0704@gmail.com');
    }
    ?>
    <form method="POST" action="control.php">

    <!-- Header -->
        <div>
            <header id="header" class="alt">
                <div class="logo"><a href="index.php">THE CASTLE <span>1997</span></a><div>
            </header>
        </div>
        <div class="mainBody">
            <nav id="nav-bar">     
                
                <a href = "vueEnsemble.php">Vue d'ensemble</a>
                <a href = "control.php">Control</a>
                <a href = "login.php">Se Connecter</a>
            </nav>
            <img class="portrait" src="img/logo.jpg">
            <p>This site was created by Minh Duc LA, Minh Thuc PHAM. It uses data from an automate using MOD BUS</p>
            <input type="submit" name="test" value="test">
            <input type="submit" name="alerte email" value="alerte_email">
            <input type="submit" name="noti email" value="noti_email">
        </div>  
        <!-- Footer -->
        <footer id="footpage">
            <ul>
                <li><a href="mailto:thecastle1997.blois@gmail.com" target="_blank">Email</a></li>
                <li><a href="http://www.linkedin.com/in/m-pham">Linkedin</a></li>                  
            </ul>
            <span> Copyright 2019 by Minh Thuc PHAM - Minh Duc LA - Viet Dao NGUYEN</span>
        </footer>
    </body>

</html>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="img/icon.png">
        <link rel="stylesheet" href="mainstyle.css">
        <title>The Castle - About</title>
    </head>
    <body>
    <?php
/********************/
/*      MODBUS      */
/********************/
    if (isset($_POST["read_bits"])){
        require_once dirname(__FILE__) . '/utils/modbus.php';
        $data = read_bits("192.168.001.100",502,25,100);
        echo PhpType::bytes2string($data);
    }

    if (isset($_POST["write_bits"])){
        require_once dirname(__FILE__) . '/utils/modbus.php';
        $data = write_bits("192.168.001.100",502,59,TRUE);          // turn on fan
        echo PhpType::bytes2string($data);
    }


/********************/
/*      EMAIL       */
/********************/
    if (isset($_POST["alerte_email"])) {
        require_once dirname(__FILE__) . '/utils/email.php';
        $to_email = 'laminhduc0704@gmail.com';
        send_alert_email($to_email);
    }

    if (isset($_POST["noti_email"])) {
        require_once dirname(__FILE__) . '/utils/email.php';
        $to_email = 'laminhduc0704@gmail.com';
        send_noti_email($to_email);
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
            <input type="submit" name="read bits" value="read_bits">
            <input type="submit" name="write bits" value="write_bits">
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
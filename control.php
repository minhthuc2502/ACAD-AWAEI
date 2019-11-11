<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="img/icon.png">
        <link rel="stylesheet" href="mainstyle.css">
        <title>The Castle - About</title>
        <script src="./node_modules/plotly.js-dist/plotly.js"></script>
    </head>
    <body>
    <?php
/********************/
/*      MODBUS      */
/********************/

/*  Read function   */
    if (isset($_POST["read_coils"])){
        require_once dirname(__FILE__) . '/utils/modbus.php';
        echo "in read colis function";
        $data = read_coils("192.168.001.100",502,25,100);
        echo PhpType::bytes2string($data);
    }

    if (isset($_POST["read_holding_registers"])){
        require_once dirname(__FILE__) . '/utils/modbus.php';
        echo "in read holding registers function";
        $data = read_holding_registers("192.168.001.100",502,25,100);
        echo PhpType::bytes2string($data);
    }
/*  Write to coils  */
    if (isset($_POST["write_single_coils"])){
        require_once dirname(__FILE__) . '/utils/modbus.php';
        echo "in write single colis function";
        write_single_coils("192.168.001.100",502,59,TRUE);          // turn on fan
    }

    if (isset($_POST["write_multiple_coils"])){
        require_once dirname(__FILE__) . '/utils/modbus.php';
        echo "in write multiple colis function";
        write_multiple_coils("192.168.001.100",502,59,TRUE);          // turn on fan
    }
/*  Write to register   */
    if (isset($_POST["write_single_register"])){
        require_once dirname(__FILE__) . '/utils/modbus.php';
        echo "in write single register function";
        write_single_register("192.168.001.100",502,59,TRUE);          // turn on fan
    }

    if (isset($_POST["write_multiple_registers"])){
        require_once dirname(__FILE__) . '/utils/modbus.php';
        echo "in write multiple register function";
        write_multiple_registers("192.168.001.100",502,59,TRUE);          // turn on fan
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

            <div class="wrapper">
                <div id="chart"></div>
                <script>
                    function getData() {
                        return Math.random();
                    }  
                    Plotly.plot('chart',[{
                        y:[getData()],
                        type:'line'
                    }]);
                    
                    var cnt = 0;
                    setInterval(function(){
                        Plotly.extendTraces('chart',{ y:[[getData()]]}, [0]);
                        cnt++;
                        if(cnt > 500) {
                            Plotly.relayout('chart',{
                                xaxis: {
                                    range: [cnt-500,cnt]
                                }
                            });
                        }
                    },15);
                </script>
            </div>
            
            <!-- Read function -->
            <input type="submit" name="read coils" value="read_coils">
            <input type="submit" name="read holding registers" value="read_holding_registers">
            <!-- Write to coils -->
            <input type="submit" name="write single coils" value="write_single_coils">
            <input type="submit" name="write multiple coils" value="write_multiple_coils">
            <!-- Write register -->
            <input type="submit" name="write single register" value="write_single_register">
            <input type="submit" name="write multiple registers" value="write_multiple_registers">

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
<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Castle - About</title>
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="nomalize.css" />
    <link rel="stylesheet" href="style.css">
    <script src="./node_modules/plotly.js-dist/plotly.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
        <!-- Header -->
        <div>
            <header id="header" class="alt">
                <div class="logo"><a href="index.php">THE CASTLE <span>1997</span></a><div>
            </header>
        </div>
        <!-- Accueil principal -->
        <div class="mainBody">
            <nav id="nav-bar">
                <ul class="main-nav">
                    <li><a href = "index.php">Home</a></li>
                    <li><a href="vueEnsemble.php">Vue d'ensemble</a></li>
                    <?php if( $_SESSION['login'] == true): ?>
                    <li><a href="control.php">Control</a></li>
                    <?php endif; ?>
                    <?php if( $_SESSION['login'] == false): ?>
                    <li><a href = "login.php">Se Connecter</a></li>
                    <?php endif; ?>
                    <?php if( $_SESSION['login'] == true): ?>
                    <li><a href = "deconnexion.php">deconnecter</a></li>
                    <?php endif; ?>
                </ul> 
            </nav>
            <!-- <img class="portrait" src="img/logo.jpg"> -->
            <!-- <p>This site was created by Minh Duc LA, Minh Thuc PHAM. It uses data from an automate using MOD BUS</p> -->
            <div class="wrapper">
                <div id="chart"></div>

            </div>
            <div class="flexBoxTemp">
                    <div class="childBox">
                        <h3>Salon</h3>
                        <div class="BoxContent" id='test'>
                            <span id='livingroom'></span>
                        </div>
                    </div>
                    <div class="childBox">
                        <h3>Chambre</h3>
                        <div class="BoxContent">
                            <span id='bedroom'></span>
                        </div>
                    </div>
                    <div class="childBox">
                        <h3>Salle de bains</h3>
                        <div class="BoxContent">
                            <span id='bathroom'></span>
                        </div>
                    </div>
                    <div class="childBox">
                        <h3>Salle à manger</h3>
                        <div class="BoxContent">
                            <span id='kitchen'></span>
                        </div>
                    </div>
            </div>
        </div>
        <!-- <ul>
            <li>FC1 - Read coils</li>
            <li>FC2 - Read input discretes</li>
            <li>FC3 - Read holding registers</li>
            <li>FC4 - Read holding input registers</li>
            <li>FC5 - Write single coil</li>
            <li>FC6 - Write single register</li>
            <li>FC15 - Write multiple coils</li>
            <li>FC16 - Write multiple registers</li>
            <li>FC22 - Mask Write register</li>
            <li>FC23 - Read/Write multiple registers</li>
        </ul>
        <form method="POST" action="utils/modbus.php">
            <input type="text" placeholder="Entrez nom de la function" name="modbus_function" />
            <button type="submit">Get function</button>
        </form> -->

        <form method="POST" action="utils/email.php">
            <input type="radio" name="type" value="noti" checked="checked"> Notification<br>
            <input type="radio" name="type" value="alert"> Alerte<br>
            <input type="text" placeholder="Entrez l'adresse email" name="addr_email" />
            <input type="submit" value="Send email" name="email_function">
        </form>
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

<script>
    setInterval(getTemp, 200);
    setInterval(getTime, 1000);
    setInterval(updateNameDisplay, 1000);

    var result_temp = 0;
    var result_time = 0;

    function getTemp() {
        jQuery.ajax({
            type: "POST",
            url: 'utils/modbus.php',
            dataType: 'json',
            data: {functionname: 'getTemp', arguments: 0},

            success: function (obj, textstatus) {
                        if( !('error' in obj) ) {
                            result_temp = obj.result;
                            console.log(result_temp);
                        }
                        else {
                            console.log(obj.error);
                        }
                    }
        });
    }

    function getTime() {
        jQuery.ajax({
            type: "POST",
            url: 'utils/modbus.php',
            dataType: 'json',
            data: {functionname: 'getTime', arguments: 0},

            success: function (obj, textstatus) {
                        if( !('error' in obj) ) {
                            result_time = obj.result;
                            console.log(result_time);
                        }
                        else {
                            console.log(obj.error);
                        }
                    }
        });
    }

    function updateNameDisplay() {
        document.getElementById('livingroom').innerHTML = result_temp[1]/10;
        document.getElementById('bedroom').innerHTML = result_temp[3]/10;
        document.getElementById('bathroom').innerHTML = result_temp[5]/10;
        document.getElementById('kitchen').innerHTML = result_temp[7]/10;
    }


    var varTest = 0;
    function getData() {
        varTest = varTest +1;
        return varTest;
        // return Math.random();
    }
    Plotly.plot('chart', [
        {
            y: [result_temp[1]/10],
            type: 'line',
            name: 'Salon'
        },
        {
            y: [result_temp[3]/10],
            type: 'line',
            name: 'Chambre'
        },
        {
            y: [result_temp[5]/10],
            type: 'line',
            name: 'Salle de bains'
        },
        {
            y: [result_temp[7]/10],
            type: 'line',
            name: 'Salle à manger'
        }
    ]);
    var cnt = 0;
    setInterval(function () {
        Plotly.extendTraces('chart', {
            y: [
                [result_temp[1]/10]
            ]
        }, [0]);
        Plotly.extendTraces('chart', {
            y: [
                [result_temp[3]/10]
            ]
        }, [1]);
        Plotly.extendTraces('chart', {
            y: [
                [result_temp[5]/10]
            ]
        }, [2]);
        Plotly.extendTraces('chart', {
            y: [
                [result_temp[7]/10]
            ]
        }, [3]);
        cnt++;
        if (cnt > 200) {
            Plotly.relayout('chart', {
                xaxis: {
                    range: [cnt - 200, cnt]
                }
            });
        }
    }, 50);
</script>
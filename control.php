<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="mainstyle.css">
    <title>The Castle - About</title>
    <script src="./node_modules/plotly.js-dist/plotly.js"></script>
</head>

<body>
    <form method="POST" action="control.php">
        <!-- Header -->
        <div>
            <header id="header" class="alt">
                <div class="logo"><a href="index.php">THE CASTLE <span>1997</span></a>
                    <div>
            </header>
        </div>
        <div class="mainBody">
            <nav id="nav-bar">

                <a href="vueEnsemble.php">Vue d'ensemble</a>
                <a href="control.php">Control</a>
                <a href="login.php">Se Connecter</a>
            </nav>
            <img class="portrait" src="img/logo.jpg">
            <p>This site was created by Minh Duc LA, Minh Thuc PHAM. It uses data from an automate using MOD BUS</p>

            <div class="wrapper">
                <div id="chart"></div>
                <script>
                    function getData() {
                        return Math.random();
                    }
                    Plotly.plot('chart', [{
                        y: [getData()],
                        type: 'line'
                    }]);

                    var cnt = 0;
                    setInterval(function () {
                        Plotly.extendTraces('chart', {
                            y: [
                                [getData()]
                            ]
                        }, [0]);
                        cnt++;
                        if (cnt > 500) {
                            Plotly.relayout('chart', {
                                xaxis: {
                                    range: [cnt - 500, cnt]
                                }
                            });
                        }
                    }, 15);
                </script>
            </div>
        </div>
        <!-- Footer -->
        <footer id="footpage">
            <ul>
                <li><a href="mailto:thecastle1997.blois@gmail.com" target="_blank">Email</a></li>
                <li><a href="http://www.linkedin.com/in/m-pham">Linkedin</a></li>
            </ul>
            <span> Copyright 2019 by Minh Thuc PHAM - Minh Duc LA - Viet Dao NGUYEN</span>
        </footer>
    </form>

    <ul>
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
    </form>

    <form method="POST" action="utils/email.php">
        <input type="radio" name="type" value="noti" checked="checked"> Notification<br>
        <input type="radio" name="type" value="alert"> Alerte<br>
        <input type="text" placeholder="Entrez l'adresse email" name="addr_email" />
        <input type="submit" value="Send email" name="email_function">
    </form>

</body>

</html>
<?php

 /**
   * init_modbus
   *
   * initialize modbus function
   */
function init_modbus() {
    require_once dirname(__FILE__) . '/../phpmodbus-master/Phpmodbus/ModbusMaster.php';
}

if (isset($_POST["modbus_function"])) {
    init_modbus();

    $ip = "192.168.001.100";
    $port = 502;
    $modbus = new ModbusMaster($ip,"TCP",$port);
    
    $debut = 49;
    $nbits = 20;
    $data = "";

    $adresse = 59;                  // ventilo
    $value = array(1);              // allumer ventilo
    $dataType = array('WORD');
    // echo strtolower($_POST["modbus_function"]);
    try {
        switch (strtolower($_POST["modbus_function"])) {
            case "fc1": 
                $data = $modbus->fc1(1,$debut, $nbits);
                break;
            case "fc2":
                $data = $modbus->fc2(1,$debut, $nbits);
                break;
            case "fc3":
                $data = $modbus->fc3(1,$debut, $nbits);
                break;
            case "fc4":
                $data = $modbus->fc4(1,$debut, $nbits);
                break;
            case "fc5":
                $modbus->fc5(0, $adresse, $value, $dataType);
                break;
            case "fc6":
                $modbus->fc6(0, $adresse, $value, $dataType); 
                break;
            case "fc15":
                $modbus->fc15(0, $adresse, $value); 
                break;
            case "fc16":
                $modbus->fc16(0, $adresse, $value, $dataType); 
                break;
            case "fc22":
                echo "we do not support this function";
                break;
            case "fc23":
                echo "we do not support this function";
                break;
            default:
                echo "Please enter the right value, batard";
        }
    } catch (Exception $e) {
        echo "Error : $e";
    }

    if ($data) {
        echo implode(" ",$data);
        echo "Sonde1: $data[0] degree \n";
        echo "Sonde2: $data[3] degree \n";
        echo "Sonde3: $data[6] degree \n";
        echo "Sonde4: $data[9] degree \n";
    }
}

/*
29 heure
31 minute
33 seconds

49 sonde test
51 test 1 - haut
53 test 2
55 test 3 - bas

59/87 ventilo
60 resistant 
*/
?>
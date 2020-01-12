<?php
    header('Content-Type: application/json');

    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            case 'getTemp':
                $aResult['result'] = getTemp();
               break;

            case 'getTime':
                $aResult['result'] = getTime();
               break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }

    echo json_encode($aResult);
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
    require_once dirname(__FILE__) . '/../phpmodbus-master/Phpmodbus/ModbusMaster.php';

    $ip = "192.168.001.100";
    $port = 502;

    $debut = 86;
    $nbits = 20;
    //$data = "";

    $modbus = new ModbusMaster($ip,"TCP",$port);
    $data = $modbus->fc3(1,$debut, $nbits);

    if ($data) {
        echo implode(" ",$data);
        // debut data at 49 
        echo "Sonde1: $data[1] degree \n";
        echo "Sonde2: $data[5] degree \n";
        echo "Sonde3: $data[9] degree \n";
        echo "Sonde4: $data[13] degree \n";

        // debut data at 27
        echo "Heure: $data[1]\n";
        echo "Minute: $data[9]\n";
        echo "Second: $data[13]\n";
    }

    $adresse = 87;                  // ventilo
    // 59*2 = 118
    // 87*2 = 174
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
                $modbus->fc16(0, $adresse, $value,$dataType); 
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
        // debut data at 49 
        echo "Sonde1: $data[1] degree \n";
        echo "Sonde2: $data[5] degree \n";
        echo "Sonde3: $data[9] degree \n";
        echo "Sonde4: $data[13] degree \n";

        // debut data at 27
        echo "Heure: $data[1]\n";
        echo "Minute: $data[9]\n";
        echo "Second: $data[13]\n";
    }
}
// For write function
// Resistant adr = 70; value = 0/1

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


function getTemp() {
    init_modbus();
    require_once dirname(__FILE__) . '/../phpmodbus-master/Phpmodbus/ModbusMaster.php';

    $ip = "192.168.001.100";
    $port = 502;

    $debut = 49;
    $nbits = 20;
    $data = $modbus->fc3(1,$debut, $nbits);
    // $data[1] = rand()%10 + 2;
    // $data[5] = rand()%10 + 6;
    // $data[9] = rand()%10 + 10;
    // $data[13] = rand()%10 + 14;
    return $data;
}

function getTime() {
    init_modbus();
    require_once dirname(__FILE__) . '/../phpmodbus-master/Phpmodbus/ModbusMaster.php';

    $ip = "192.168.001.100";
    $port = 502;

    $debut = 27;
    $nbits = 20;
    $data = $modbus->fc3(1,$debut, $nbits);
    // $data[1] = 1;
    // $data[9] = 9;
    // $data[13] = 13;
    return $data;
}
?>
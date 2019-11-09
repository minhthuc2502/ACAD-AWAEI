<?php

 /**
   * init_modbus
   *
   * initialize modbus function
   */
function init_modbus() {
    require_once dirname(__FILE__) . '/../phpmodbus-master/Phpmodbus/ModbusMaster.php';
}

 /**
   * read_bits
   *
   * read bits for modbus
   * 
   * return recData : data read from modbus
   */

function read_bits($ip,$port,$debut,$nbits)
{
    init_modbus();

    $modbus = new ModbusMaster($ip,"TCP",$port);
    $recData = $modbus->readCoils(1,$debut, $nbits);
    return $recData;
}

function write_bits($ip,$port,$adresse,$value) {
    init_modbus();
    $modbus = new ModbusMaster($ip,"TCP",$port);
    $modbus->writeMultipleCoils(0, $adresse, $value);
}

/*
29 heure
31 minute
33 seconds

49 sonde test
51 test 1 - haut
53 test 2
55 test 3 - bas

59 ventilo
60 resistant 
*/
?>
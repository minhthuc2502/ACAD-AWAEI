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

/********************/
/*  Read function   */
/********************/
function read_coils($ip,$port,$debut,$nbits)
{
    init_modbus();
    $modbus = new ModbusMaster($ip,"TCP",$port);
    // $recData = $modbus->readCoils(1,$debut, $nbits);
    $recData = $modbus->fc1(1,$debut, $nbits);
    return $recData;
}

function read_holding_registers($ip,$port,$debut,$nbits)
{
    init_modbus();
    $modbus = new ModbusMaster($ip,"TCP",$port);
    $recData = $modbus->fc3(1,$debut, $nbits);
    return $recData;
}

/********************/
/*  Write to coils  */
/********************/
function write_single_coils($ip,$port,$debut,$nbits)
{
    init_modbus();
    $modbus = new ModbusMaster($ip,"TCP",$port);
    $modbus->fc5(0, $adresse, $value, 1);
}

function write_multiple_coils($ip,$port,$adresse,$value) {
    init_modbus();
    $modbus = new ModbusMaster($ip,"TCP",$port);
    $modbus->fc15(0, $adresse, $value);
}

/************************/
/*  Write to register   */
/************************/
function write_single_register($ip,$port,$adresse,$value) {
    init_modbus();
    $modbus = new ModbusMaster($ip,"TCP",$port);
    $modbus->fc6(0, $adresse, $value, 1);
}

function write_multiple_registers($ip,$port,$adresse,$value) {
    init_modbus();
    $modbus = new ModbusMaster($ip,"TCP",$port);
    $modbus->fc16(0, $adresse, $value, 1);
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
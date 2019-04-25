<?php
/**
 * This is a demo script for the functions of the PHP ESC/POS print driver,
 * Escpos.php.
 *
 * Most printers implement only a subset of the functionality of the driver, so
 * will not render this output correctly in all cases.
 *
 * @author Michael Billington <michael.billington@gmail.com>
 */
require __DIR__ . '/../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$nombre_impresora = "POS"; 


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);

/* Initialize */
$printer -> initialize();

/* Text */
//$printer -> text("Hello world\n");
//$printer -> cut();

$testStr = "Testing 123";
$models = array(
    //Printer::QR_MODEL_1 => "QR Model 1",
    Printer::QR_MODEL_2 => "QR Model 2 (default)"
    //Printer::QR_MICRO => "Micro QR code\n(not supported on all printers)"
);
foreach ($models as $model => $name) {
    $printer -> qrCode($testStr, Printer::QR_ECLEVEL_L, 3, $model);
    //$printer -> text("$name\n");
    $printer -> feed();
}
$printer -> cut();

/* Pulse */
$printer -> pulse();

/* Always close the printer! On some PrintConnectors, no actual
 * data is sent until the printer is closed. */
$printer -> close();
header('Location: http://www.example.com/');

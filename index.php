<?php

require("correo.php");
require("excel.php");


$newExcel = new Excel();
$path_file = $newExcel->generateExcel();

$e_mail = new Correo();
$e_mail->sendEmail($path_file);

?>

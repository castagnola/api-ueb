<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');
require_once "AuxInformeCertificadoPqrs.php";
require_once(__DIR__ . '/../../vendor/autoload.php');


class InformeCertificadoPqrs extends AuxInformeCertificadoPqrs
{

}

$mpdf = new \Mpdf\Mpdf();
$header = '<html>
<div style="text-align:center;border: solid;width:500px; margin-left: 100px; font-family: Times New Roman">Reporte de solicitud</div>
<img style="height:100px;margin-top: -50px" src="../../views/images/logo.png"/>
</html>';

$html = '<html>

<div></div>
</html>';
$mpdf->SetHTMLHeader($header);
$mpdf->WriteHTML($html);
$mpdf->Output();
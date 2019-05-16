<?php

namespace App\Http\Controllers\CustomsControllers\PdfInformes\InformeReporteGeneral;

use App\TipoPqrs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

require_once "AuxInformeController.php";

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

class InformeReporteGeneral extends Controller
{
    public $informe;


    /**
     * Metodo para vizualizar el reporte en PDF
     * @throws \Mpdf\MpdfException
     */
    public function showReporte()
    {
        $mpdf = new \Mpdf\Mpdf();
//        $mpdf->showImageErrors = true;


        /**
         * inicializa la info del reporte
         */
        $this->init();

        /**
         * Header
         */
        ob_start();
        include "informeReporteGeneralHeaderTemplate.php";
        $header = ob_get_contents();;
        ob_end_clean();

        /**
         * Body
         */
        ob_start();
        include "informeReporteGeneralBodyTemplate.php";
        $html = ob_get_contents();;
        ob_end_clean();

        $mpdf->SetHTMLHeader($header);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    /**
     * Inforación del reporte
     */
    public function init()
    {
        $auxInforme = new AuxInformeController();
        $this->informe = $auxInforme->getInfoReporte();
    }
}

<?php

namespace App\Http\Controllers\CustomsControllers\PdfInformes\InformeReporteGeneral;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

use App\Http\Controllers\AuthController;
use App\TipoPqrs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

require_once "AuxInformeController.php";


class InformeReporteGeneral extends Controller
{
    /**
     * Atributes
     * @var
     */
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

        /**
         * Footer
         */
        ob_start();
        include "informeReporteGeneralFooterTemplate.php";
        $footer = ob_get_contents();;
        ob_end_clean();

        /**
         * Pinta el PSF
         */
        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    /**
     * Funcion inicial de la informacion del reporte
     */
    public function init()
    {
        $auxInforme = new AuxInformeController();

        isset($_GET["id"]) ? $this->informe = $auxInforme->getInfoReporteByTipo($_GET["id"]) : $this->informe = $auxInforme->getInfoReporte();


    }
}

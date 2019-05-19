<?php

namespace App\Http\Controllers\CustomsControllers\PdfInformes\InformeReporteIndividual;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomsControllers\PdfInformes\InformeReporteGeneral\AuxInformeReporteIndividual;
use App\TipoPqrs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

require_once "AuxInformeReporteIndividual.php";


class InformeReporteIndividual extends Controller
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
        include "informeReporteIndividualHeaderTemplate.php";
        $header = ob_get_contents();;
        ob_end_clean();

        /**
         * Body
         */
        ob_start();
        include "informeReporteIndividualBodyTemplate.php";
        $html = ob_get_contents();;
        ob_end_clean();

        /**
         * Footer
         */
        ob_start();
        include "informeReporteIndividualFooterTemplate.php";
        $footer = ob_get_contents();;
        ob_end_clean();

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
        $auxInforme = new AuxInformeReporteIndividual();

        $this->informe= $auxInforme->getInfoReporteById($_GET["id"]);


    }
}

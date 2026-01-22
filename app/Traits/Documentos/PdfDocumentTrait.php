<?php

namespace App\Traits\Documentos;

use Dompdf\Dompdf;

trait PdfDocumentTrait {
    
    public function createPdfBase64($datos, $vista, $filename) {
        $dompdf = new Dompdf();
        $html = view($vista, $datos)->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $output = $dompdf->output();
        $base64 = base64_encode($output);

        return [
            'pdf' => $base64,
            'filename' => $filename
        ];
    }

    public function createPdfBase64Horizontal($datos, $vista, $filename) {
        $dompdf = new Dompdf();
        $html = view($vista, $datos)->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $output = $dompdf->output();
        $base64 = base64_encode($output);

        return [
            'pdf' => $base64,
            'filename' => $filename
        ];
    }

}

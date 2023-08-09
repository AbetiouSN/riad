<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function index()
    {
        return view('pdf');
    }

    public function telechargerPDF(Request $request)
    {
        // Render the view and get its HTML content
        $html = view('fature')->render();

        // Génération du PDF à partir du HTML
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');

        // Rendre le HTML en PDF
        $dompdf->render();

        // Téléchargement du PDF
        return $dompdf->stream('facture.pdf');
    }
}


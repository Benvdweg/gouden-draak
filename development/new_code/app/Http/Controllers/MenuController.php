<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Dompdf\Dompdf;

class MenuController extends Controller
{
    public function downloadPdf()
    {
        // Fetch dishes grouped by type
        $dishesByType = Dish::with('type')->whereNotNull('menu_number')->orWhereNotNull('addition_id')->get()->groupBy('type_id');

        // Create PDF
        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf.dishes', compact('dishesByType')));

        // (Optional) Set paper size and orientation
        $pdf->setPaper('A4');

        // Render PDF (important for generating the actual PDF content)
        $pdf->render();

        // Stream the PDF to the user
        return $pdf->stream('dishes.pdf');
    }
}

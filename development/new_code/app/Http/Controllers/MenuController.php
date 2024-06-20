<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Dompdf\Dompdf;

class MenuController extends Controller
{
    public function downloadPdf()
    {
        $dishesByType = Dish::with('type')->whereNotNull('menu_number')->orWhereNotNull('addition_id')->get()->groupBy('type_id');

        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf.dishes', compact('dishesByType')));

        $pdf->setPaper('A4');

        $pdf->render();

        return $pdf->stream('dishes.pdf');
    }
}

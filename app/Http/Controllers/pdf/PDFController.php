<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\Events_view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($data){
        $pdf = PDF::loadView('pdf.meet-program', $data);

        // return $pdf->stream('webappfix.pdf');

        // Get the raw PDF data
        $pdfOutput = $pdf->output();

        // Define the PDF file name
        $pdfFileName = 'document.pdf';

        // Use the Storage facade to save the PDF to the 'public' disk (or any other disk you prefer)
        Storage::disk('public')->put("pdfs/{$pdfFileName}", $pdfOutput);

        $filePath = Storage::disk('public')->path("pdfs/{$pdfFileName}"); // path for onlline
        $filePath = 'http://localhost:8000/storage/pdfs/'.$pdfFileName;  // path for local machine

        // Return a response or redirect, as needed
        return response()->json(['success' => true, 'message' => 'PDF saved successfully!', 'data' =>  $filePath]);
        }
}

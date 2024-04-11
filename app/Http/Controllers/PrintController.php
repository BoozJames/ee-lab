<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintController extends Controller
{
    public function print()
    {
        // Fetch the latest request from the model
        $latestRequest = Requests::latest()->first();

        // Check if a request is found
        if ($latestRequest) {
            // HTML content representing the PDF view
            $htmlContent = view('print_view', ['latestRequest' => $latestRequest])->render();

            // Generate PDF with the HTML content
            $pdf = PDF::loadHTML($htmlContent);

            // Set paper size to A8
            $pdf->setPaper('a8');

            // Get the reference number
            $referenceNumber = $latestRequest->reference_number;

            // Stream the PDF with the reference number as the filename
            return $pdf->stream($referenceNumber . '.pdf');
        } else {
            // Handle case where no request is found
            return response()->json(['message' => 'No request found.']);
        }
    }
}

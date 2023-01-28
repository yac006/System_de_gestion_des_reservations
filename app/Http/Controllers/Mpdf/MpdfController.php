<?php

namespace App\Http\Controllers\Mpdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;


class MpdfController extends Controller
{


        public function generate_pdf()
        {
            $data = DB::table('employes')->get()->first();    
            $pdf = PDF::loadView('components.pdf_document', compact('data'));

            return $pdf->stream('pdf_document.pdf');
            
        }
}

<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\FollowUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ViewPdfController extends Controller
{
    public function viewPdf($area, $parameter)
    {
        $areaData = Area::where('id', $area)->first();
        $filePath = $areaData->{'pdf_' . $parameter};

        if (!Storage::exists($filePath)) {
            abort(404, 'PDF not found');
        }

        $fileContent = Storage::get($filePath);

        return response($fileContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
        ]);
    }

    public function viewPdfTindakLanjut($followUp)
    {
        $followUpData = FollowUp::where('id', $followUp)->first();
        $filePath = $followUpData->document_path;

        if (!Storage::exists($filePath)) {
            abort(404, 'PDF not found');
        }

        $fileContent = Storage::get($filePath);

        return response($fileContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
        ]);
    }
}

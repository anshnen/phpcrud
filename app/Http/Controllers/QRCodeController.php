<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScannedData;

class QRCodeController extends Controller
{
    public function getQRForm()
    {
        return view('qr');
    }

    public function postDecodeQR(Request $request)
    {
        $scannedData = $request->input('data');

        $newData = new ScannedData();
        $newData->content = $scannedData;
        $newData->save();

        return response()->json(['message' => 'Data received and stored successfully']);
    }
}

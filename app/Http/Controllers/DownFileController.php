<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use ZanySoft\Zip\Zip;
use ZanySoft\Zip\ZipManager;

class DownFileController extends Controller
{
    public function downloader($filePath){
    if (Storage::exists($filePath)) {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        if (strtolower($extension) === 'zip') {
            $zipFilePath = public_path($filePath);
            $extractPath = public_path('storage/unzipped/');

            if (!is_dir($extractPath)) {
                mkdir($extractPath, 0755, true);
            }

            $zip = new ZipArchive();
            if ($zip->open($zipFilePath) === true) {
                $zip->extractTo($extractPath);
                $zip->close();

                $extractedFiles = scandir($extractPath);

                if (count($extractedFiles) > 2) {
                    $firstUnzippedFile = $extractedFiles[2]; 
                    $filePath = 'unzipped/'. $firstUnzippedFile;
                } else {
                    return abort(404, 'No files found inside the ZIP archive');
                }
            } else {
                return abort(500, 'Failed to unzip the file');
            }
        }
        return response()->download(public_path($filePath));
    }
}

    public function showFileList(){
        $files = File::all();

        return view('filelist', ['files' => $files]);
    }
}

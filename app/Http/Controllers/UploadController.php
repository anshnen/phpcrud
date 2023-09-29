<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use ZanySoft\Zip\Zip;
use ZanySoft\Zip\ZipManager;
use ZipArchive;

class UploadController extends Controller
{
    public function createForm(){
        return view('uploadfile');
    }

    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlsx,xls,pdf,jpg,jpeg,png,gif'
        ]);

        if ($req->hasFile('file')) {
            $uploadedFile = $req->file('file');
            $originalFileSize = $uploadedFile->getSize();
    
            if ($originalFileSize >= 2048 * 1024) {
    
                $originalFileName = $uploadedFile->getClientOriginalName();
                $compressedFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '.zip';
    
                $zip = new ZipArchive();
                $zipFilePath = public_path('storage/' . $compressedFileName);
    
                if ($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
                    $zip->addFile($uploadedFile->getRealPath(), $originalFileName);
                    $zip->close();
    
                    $compressedFilePath = 'storage/' . $compressedFileName;
    
                    $file = new File();
                    $file->name = $compressedFileName;
                    $file->file_path = $compressedFilePath;
                    $file->save();
    
                    return back()
                        ->with('success', 'File has been compressed and stored.')
                        ->with('compressed_file', $compressedFilePath);
                } else {
                    return back()
                        ->with('error', 'Failed to create ZIP file.');
                }
            } else {
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
                $filePath = $uploadedFile->storeAs('uploads', $fileName, 'public');
    
                $file = new File();
                $file->name = $uploadedFile->getClientOriginalName();
                $file->file_path = $filePath;
                $file->save();
    
                return back()
                    ->with('success', 'File has been uploaded.')
                    ->with('file', $fileName);
            }
        }

            return back()->with('error', 'File upload failed.');
    }
}
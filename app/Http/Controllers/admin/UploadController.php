<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,webp',
            'folder' => 'required|string'
        ]);

        $folder = preg_replace('/[^a-zA-Z0-9_-]/', '', $request->folder);

        $path = public_path("uploads/$folder");

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');
        $filename = time() . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
        $file->move($path, $filename);

        return response()->json([
            'filename' => $filename
        ]);
    }
    function deleteOldImage(Request $request)
    {
        $path = public_path("uploads/{$request->folder}/{$request->filename}");
        if (file_exists($path)) {
            unlink($path);
        }
        return response()->json(['success' => true]);
    }
}

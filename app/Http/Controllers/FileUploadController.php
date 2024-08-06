<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        return view("upload");
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', //Max 10MB
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();

        $path = $file->storeAs('uploads', $originalName, 's3');

        FileUpload::create([
            'file_path' => $path,
            'original_name' => $originalName,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success','Arquivo enviado com sucesso. Aguardando aprovação.');
    }

    public function approve($id)
    {
        $fileUpload = FileUpload::findOrFail($id);
        $fileUpload->status = 'approved';
        $fileUpload->save();

        return back()->with('success', 'Arquivo aprovado com sucesso.');
    }

    public function reject($id)
    {
        $fileUpload = FileUpload::findOrFail($id);

        $filePath = $fileUpload->file_path;

        if(Storage::disk('s3')->exists($filePath)) {
            Storage::disk('s3')->delete($filePath);
        }

        $fileUpload->delete();

        return back()->with('success', 'Arquivo rejeitado com sucesso.');
    }

    public function index() {
        $fileUploads = FileUpload::whereNotNull('original_name')
                                ->where('original_name', '!=', '')
                                ->where('status', 'approved')
                                ->paginate(5);

        return view('archives', [
            'files' => $fileUploads
        ]);
    }

    public function edit() {
        $fileUploads = FileUpload::whereNotNull('original_name')
                                ->where('original_name', '!=', '')
                                ->where('status', 'pending')
                                ->paginate(5);

        return view('edit', [
            'files' => $fileUploads
        ]);
    }
}

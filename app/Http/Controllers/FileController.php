<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function getFiles() {
        return File::with(['organization', 'currentStep'])->paginate(10);
    }

    public function getHistories(File $file) {
        return $file->histories()->get();
    }

    public function createFile(Request $request) {
        File::create([
            'user_id' => $request->user()->id,
            'payer_name' => $request->payer_name,
            'name' => $request->name,
            'organization_id' => $request->organization_id,
            'file_type_id' => $request->file_type_id,
            'price' => $request->price
        ]);
        return $request;
    }
}

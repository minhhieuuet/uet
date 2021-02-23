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
}

<?php

namespace App\Http\Controllers;

use App\Imports\CollegeImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CollegeImportController extends Controller
{
    //

    public function store(Request $request)
    {
        $file = $request->file('uploaded-file');

        Excel::import(new CollegeImport,$file);
        // (new CollegeImport)->import($file);

        return back()->withStatus('Excel imported successfully');
    }
}

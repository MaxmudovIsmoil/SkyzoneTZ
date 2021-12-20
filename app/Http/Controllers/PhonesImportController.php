<?php

namespace App\Http\Controllers;

use App\Imports\PhonesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PhonesImportController extends Controller
{
    public function index()
    {
        return view('phone_import.index');
    }


    public function store(Request $request)
    {
        $request->validate([
            'file'=> 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('file');
        Excel::import(new PhonesImport, $file);

        return back()->withStatus('Fayl muvaffaqiyatli yuklandi');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserImport;
use App\Exports\Export;


class ExcelController extends Controller
{
    public function view(){
        return view('test');
    }

    public function exportFileMau(){
        // export file excel mẫu
        return Excel::download(new UserExport, 'Danh sách User Mẫu.xlsx');
    }

    public function importExcelFile(Request $req){
        $req->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        Excel::import(new UserImport, $req->file('file'));

    }

    public function exportFileUser(){
        return Excel::download(new Export, 'Danh sách User.xlsx');
    }
}
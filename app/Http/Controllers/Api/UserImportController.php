<?php

namespace App\Http\Controllers\Api;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class UserImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        Excel::import(new UsersImport, $request->file('file'));

        return response()->json(['message' => 'Users imported successfully!']);
    }
}

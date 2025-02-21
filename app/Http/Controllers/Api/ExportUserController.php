<?php

namespace App\Http\Controllers\Api;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportUserController extends Controller
{
    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}

<?php

namespace App\Http\Controllers\Voyager\Imports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductImportController extends Controller
{
    public function import()
    {
        Excel::import(new ProductImport, 'users.xlsx');

        return redirect('/')->with('success', 'All good!');
    }
}

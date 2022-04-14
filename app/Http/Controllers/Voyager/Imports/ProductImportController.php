<?php

namespace App\Http\Controllers\Voyager\Imports;

use App\Http\Controllers\Controller;
use App\Models\DocumentB1Status;
use App\Models\Status;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use TCG\Voyager\Facades\Voyager;

class ProductImportController extends Controller
{
    public function index()
    {
        return view('vendor.voyager.import.browse');
    }

    public function import(Request $request)
    {
        Excel::import(new ProductImport, $request->file('import'));

        return back()->with('success', 'Import done');
    }
}

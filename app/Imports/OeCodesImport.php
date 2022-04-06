<?php

namespace App\Imports;

use App\Models\OeCodes;
use Maatwebsite\Excel\Concerns\ToModel;

class OeCodesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new OeCodes([
            //
        ]);
    }
}

<?php

namespace App\Imports;

use App\Models\Img;
use Maatwebsite\Excel\Concerns\ToModel;

class ImgImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Img([
            //
        ]);
    }
}

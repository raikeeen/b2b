<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;


class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        return new Product([
            'name'  => $row['name'],
            'supplier_reference' => $row['supplier_reference'],
            'reference' => $row['reference'],
            'stock_shop' => $row['stock_shop'],
            'stock_supplier' => $row['stock_supplier'],
            'trade_margin' => $row['trade_margin'],
            'description' => $row['description'],
            'short_description' => $row['short_description'],
        ]);
    }
}

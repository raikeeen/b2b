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
            'trade_margin_pard' => $row['trade_margin_pard'],
            'description' => $row['description'],
            'short_description' => $row['short_description'],
            'price' => $row['price'],
            'price_add' => $row['price_add'],
            'supplier_id' => $row['supplier_id'],
            'margin_id' => $row['margin_id'],
            'b1_product_id' => $row['b1_product_id'],
        ]);
    }
}

<?php

namespace App\Imports;

use App\Models\Img;
use App\Models\OeCodes;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $product = Product::create([
            'name'  => $row['name'],
            'supplier_reference' => $row['supplier_reference'],
            'reference' => $row['reference'],
            'stock_shop' => $row['stock_shop'],
            'stock_supplier' => $row['stock_supplier'],
            'stock_supplier2' => $row['stock_supplier2'],
            'trade_margin' => $row['trade_margin'],
            'trade_margin_pard' => $row['trade_margin_pard'],
            'short_description' => $row['short_description'],
            'price' => $row['price'],
            'price_add' => $row['price_add'],
            'supplier_id' => $row['supplier_id'],
            'b1_product_id' => $row['b1_product_id'],
        ]);

        if(isset($product)) {

            $oeImport = explode(', ', $row['oe_codes']);
            if(!empty($oeImport) && !empty($row['oe_codes'])) {

                foreach ($oeImport as $code) {
                    $oe = OeCodes::create([
                        'name' => 'OE',
                        'code' => $code,
                        'product_id' => $product->id
                    ]);
                }
            }

            $imgImport = explode(',', $row['imgs']);
            if(!empty($imgImport) && !empty($row['imgs'])) {
                foreach ($imgImport as $img) {
                    $photo = Img::create([
                        'name' => $img,
                        'product_id' => $product->id
                    ]);
                }
            }
            return $product;
        }

    }
}

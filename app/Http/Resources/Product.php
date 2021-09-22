<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'reference'         => $this->reference,
            'stock_shop'        => $this->stock_shop,
            'stock_supplier'    => $this->stock_supplier,
            'description'       => $this->description,
            'short_description' => $this->short_description,
            'price'             => $this->price
        ];
    }
    public function with($request)
    {
        return [
            'version' => '1.0.1',
            'link' => route('product.index',$this->reference)
        ];
    }
}

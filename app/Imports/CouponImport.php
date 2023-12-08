<?php

namespace App\Imports;

use App\Models\Coupon;
use Maatwebsite\Excel\Concerns\ToModel;

class CouponImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $data; 

    public function __construct(array $data = [])
    {
        $this->data = $data; 
    }


    public function model(array $row)
    {
        
        return new Coupon([
            "coupon_code" => $row[0],
            "amount" => $row[1],
            "status" => 0,
            "category_name" => $this->data['category_name']
        ]);
    }
}

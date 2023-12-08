<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denominations extends Model
{
    use HasFactory;
    
    protected $table = 'denominations';

    protected $fillable = ['name','email','mobile_number','coupon_code','amount','status'];
   
}

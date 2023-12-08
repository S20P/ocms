<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = ['name','description','image'];

    protected $dates = ['deleted_at'];

    public function products()
	{
	    return $this->belongsToMany(Products::class, 'product_categories', 'category_id', 'product_id');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table="products";

    protected $fillable=[
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'category_id',
        'price',
        'brand',
        'size',
        'colors',
        'quantity',
        'main_image',
        'sub_images',
        'status',

    ];





    public function category(){
        return $this->belongsTo(Category::class,'category_id')
            ->select('categories.*',
                             'cate_name_' . app()->getLocale() . ' as category_name'
        );
    }

     public function reviews(){
        return $this->hasMany(Review::class);
     }






}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table="categories";

    protected  $fillable=[

        'cate_name_ar',
        'cate_desc_ar',
        'cate_name_en',
        'cate_desc_en',
        'status',
        'parent_id',
        'cate_image'
    ];


    // relationship with products [one to many]

    public function products(){
        return $this->hasMany(Product::class);
    }







}

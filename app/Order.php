<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table="orders";

    protected $fillable=['user_id','product_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }









}

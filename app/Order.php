<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;
use App\Client;

class Order extends Model
{
    protected $guarded = [];


    public function client()
    {
        return $this->belongsTo(Client::class);

    }//end of user

   public function products()
   {
       return $this->belongsToMany(Product::class , 'product_order')->withPivot('quantity');
   }// end of product

}// end of model

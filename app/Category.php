<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Product;

class Category extends Model implements TranslatableContract
{
    use Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['name'];

    // protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }// end of products








}//end of model

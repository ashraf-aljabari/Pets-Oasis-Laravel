<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "categories";
    public $primaryKey = 'category_id';
    public $timestamps = true;
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function subCategories()
    {
        return $this->hasMany(Sub_Category::class);
    }
}

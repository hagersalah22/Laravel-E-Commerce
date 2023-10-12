<?php

namespace App\Models;
use App\Policies\ProductPolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{

    protected $fillable = ['name', 'price', 'image','category_id', 'description','user_id'];

    use HasFactory;
    function category(){
        return $this->belongsTO(Category::class);
    }

}

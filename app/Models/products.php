<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categories;

class products extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'price', 'discount', 'category_id'];

    public function category(){
        return $this->hasOne(categories::class, 'id', 'category_id');
    }
}

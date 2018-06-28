<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Item extends Model
{
    protected $fillable = [
        'name', 'quantity', 'price', 'category_id', 'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

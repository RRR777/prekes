<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function items()
    {
        return $this->belongsTo(Item::class);
    }
}

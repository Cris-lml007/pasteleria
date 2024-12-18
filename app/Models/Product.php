<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'price',
        'description',
        'category_id',
        'status'
    ];

    public function category(){
        //return Category::find($this->type);
        return $this->belongsTo(Category::class);
    }

    protected function casts() : array
    {
        return [
            'status'=> Status::class
        ];
    }
}

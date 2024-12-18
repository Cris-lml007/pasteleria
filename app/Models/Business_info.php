<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business_info extends Model
{
    use HasFactory;

    protected $table="business_info";

    public $fillable=[
        'bank',
        'number_account',
        'token',
        'refund'
    ];
}

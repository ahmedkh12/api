<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'cats';

    protected $fillable = [
        'id' , 'name' ,'price'
    ];


}

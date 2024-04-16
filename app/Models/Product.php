<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(Image::class);
    }


    protected $fillable = ['code', 'name', 'description', 'value', 'quantity'];

    protected $primaryKey = 'code';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'value' => 'decimal:2',
    ];
}



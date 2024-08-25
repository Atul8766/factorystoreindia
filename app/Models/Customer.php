<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'shop'];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop');
    }
    
}

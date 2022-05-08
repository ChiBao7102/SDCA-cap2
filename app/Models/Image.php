<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'img_car',
        'car_id',
    ];
    public function cars(){
        return $this->belongsTo(Car::class);
    }
}

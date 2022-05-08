<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'phone',
        'address',
        'id_number',
        'id_driver_license',
        'img_id',
        'img_license',
        'car_id'
    ];
    public function cars(){
        return $this->belongsTo(Car::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    // public $guarded = [];
    protected $fillable = [
        'name',
        'model',
        'license_plates',
        'price',
        'carrier_pep',
        'user_id',
        'status',
    ];
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}

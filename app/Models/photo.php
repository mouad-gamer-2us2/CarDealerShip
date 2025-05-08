<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class photo extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_photo';

    protected $fillable = [
        'image',
        'car_image',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_image', 'car_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class equipement extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_equipement';

    protected $fillable = [
        'equipement_name',
        'car_eq',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_eq', 'car_id');
    }
}

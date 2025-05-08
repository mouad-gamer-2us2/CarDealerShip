<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class item extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_item';

    protected $fillable = [
        'item_name',
        'car_it',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_it', 'car_id');
    }
}

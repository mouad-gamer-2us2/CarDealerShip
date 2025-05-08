<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class car extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'car_id';

    protected $fillable = [
        'make',
        'model',
        'engine',
        'body_style',
        'drivetrain',
        'transmission',
        'horsepower',
        'mileage',
        'vin',
        'status',
        'exterior_color',
        'interior_color',
        'condition',
        'price',
        'car_description',
        'modified',
        'listed_by',
        'bought_by',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'make', 'brand_id');
    }

    public function body()
    {
        return $this->belongsTo(Body::class, 'body_style', 'body_id');
    }

    public function listedBy()
    {
        return $this->belongsTo(User::class, 'listed_by');
    }

    public function boughtBy()
    {
        return $this->belongsTo(User::class, 'bought_by');
    }

    public function equipements()
    {
        return $this->hasMany(Equipement::class, 'car_eq', 'car_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'car_it', 'car_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'car_image', 'car_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class body extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'body_id';

    protected $fillable = [
        'body_type',
        'body_description',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class, 'body_style', 'body_id');
    }
}

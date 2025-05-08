<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class brand extends Model
{
    use SoftDeletes ; 

   

   
    protected $primaryKey = 'brand_id';

    
    

    protected $fillable = [
        'brand_name',
        'brand_description',
        'brand_logo',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class, 'make', 'brand_id');
    }
}

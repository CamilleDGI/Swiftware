<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockroom extends Model
{

    protected $table = 'stockrooms';
    protected $fillable = ['name','is_active','capacity', 'unit_of_measurement'];

    public function getIsActiveAttribute($value)
    {
        return $value ? 'Active' : 'Inactive';
    }

    public function getIsOcuppiedAttribute($value)
    {
        return $value ? 'Occupied' : 'Vacant';
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

}

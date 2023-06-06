<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['name', 'is_active', 'stockroom', 'start', 'end', 'note', 'with_inventory', 'used_access', 'doc_req', 'remarks', 'logo'];

    public function getIsActiveAttribute($value)
    {
        return $value ? 'Active' : 'Inactive';
    }

    public function getWithInventoryAttribute($value)
    {
        return $value ? 'With Inventory' : 'Without Inventory';
    }

    public function stockroom()
    {
        return $this->belongsTo(Stockroom::class, 'stockroom', 'name');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'customer_id');
    }


    

}

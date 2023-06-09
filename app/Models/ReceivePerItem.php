<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivePerItem extends Model
{
    protected $table = 'receive_per_item';
    protected $fillable = ['product_name', 'product_qty'];

    public function receive()
    {
        return $this->belongsTo(Receive::class, 'receive_id');
    }
    public function stockroom()
    {
        return $this->belongsTo(Stockroom::class, 'stockroom_id');
    }
}

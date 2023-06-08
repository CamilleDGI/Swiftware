<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    public function stockroom()
    {
        return $this->belongsTo(Stockrrom::class, 'stockroom_id');
    }
}

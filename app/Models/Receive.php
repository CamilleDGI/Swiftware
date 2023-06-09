<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ReceiveBatchGenerator;

class Receive extends Model
{   
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($receive) {
            $receive->id = ReceiveBatchGenerator::generate([
                'table' => $receive->getTable(). 'id',
                'length' => 8,
                'prefix' => date('y'),
            ]);
        });
    }

    protected $table = 'receives';
    protected $fillable = [
        'id',
        'attachments',
        'doc_ref',
        'customer_name',
        'stockroom_name',

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(ReceivePerItem::class, 'receive_id');
    }

}


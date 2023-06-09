<?php
namespace App\Helpers;
use Haruncpi\LaravelIdGenerator\IdGenerator;


    class ReceiveBatchGenerator
    {
        public static function generate($options)
        {
            $table = $options['table'];
            $length = $options['length'];
            $prefix = $options['prefix'];

            return $prefix . substr(md5(uniqid()), 0, $length);
        
            $year = date('y');
            $existingRowsCount = Receive::count();

            $numericPart = str_pad($existingRowsCount + 1, 8, '0', STR_PAD_LEFT);

            $batchNumber = $year . $numericPart;

            return $batchNumber;
        }


    }


// class Helper{

//     public static function boot()
//     {
//         parent::boot();
//         self::creating(function ($model) {
//             $model->uuid = ReceiveBatchGenerator::generate(['table' => $this->table, 'length' => 8, 'prefix' => 'REC-']);
//         });
//     }
// }



?>
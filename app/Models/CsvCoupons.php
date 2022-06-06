<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CsvCoupons extends Model
{
    protected $table = 'csvcoupons';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    protected $fillable = [
        'appname',
        'clientname',
        'titleen',
        'titlear',
        'code',
        'status',
        'coupontype',
        'disc_percentage',
        'category',
        'tag'
    ];
}

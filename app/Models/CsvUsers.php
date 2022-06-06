<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CsvUsers extends Model
{
    protected $table = 'csvusers';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    protected $fillable = ['userid', 'firstname', 'lastname', 'address'];
    
}

<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    // Assign table name
    protected $table = 'karyawan';
    // Assign PK
    protected $primarykey = 'id';

    // Set fillable data from DB
    protected $fillable = ['name', 'email', 'bod', 'sex', 'kota'];
}

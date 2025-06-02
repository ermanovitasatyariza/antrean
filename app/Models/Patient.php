<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv_Sphaira';
    protected $table = 'Patient';
    protected $guarded = ['Patient'];
    protected $primaryKey = 'Patient';

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'Employee';
    protected $fillable = [
        'EID',
        'FName',
        'LName',
        'DoB',
        'Gender',
        'Phone',
        'Address',
        'Zip',
        'Department'
    ];
}

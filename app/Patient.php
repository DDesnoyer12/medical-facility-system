<?php

//Timeslot just has dates/times

//associative entity between timeslot and physician
//appointment -> associative
//who made the appointment?

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'Patient';
    protected $fillable = [
        'PID',
        'FName',
        'LName',
        'DoB',
        'Gender',
        'Phone',
        'Address',
        'Zip',
        'InsuranceType'
    ];
}

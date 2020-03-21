<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testModel extends Model
{
    protected $table = 'employee';

    protected $fillable=['EMP_CODE', 'FNAME', 'LNAME', 'CONTACT_NUMBER', 'EMAIL', 'ADDRESS1', 'LANDMARK', 'PINCODE', 'CITY', 'STATE', 'COUNTRY', 'PASSWORD', 'DOB', 'GENDER'];

    public $timestamps=false;

    protected $primaryKey = 'EID'; 
}

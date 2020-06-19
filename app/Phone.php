<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = "phones";

    protected $primaryKey = 'hospital_id';

    protected $fillable = [
        "phone",
        "hospital_id"
    ];
}

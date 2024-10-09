<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporality extends Model
{
    use HasFactory;

     // Defines attributes that can be mass assigned.
     protected $fillable = [

        'temporalities_temporality_name',
        'temporalities_day',
        'temporalities_alert_n1',
        'temporalities_alert_n2',
        'temporalities_alert_n3',
        'temporalities_alert_n4',


     ];



     //Hide attributes when the model is converted to an array or JSON.
     protected $hidden = [



     ];

     //Converts attributes to a specific data type.
     protected $casts = [


     ];

}

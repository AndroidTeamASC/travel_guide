<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    protected $fillable= ['station','phone','location','city_id','state_id'];
}

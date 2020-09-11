<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
 protected $fillable = [
        'place_name','image','city_id','wonderful','best_month','location','map','recommend','lat','long','description','category_id','state_id','status'
    ];
    // public function listing($value='')
    // {
    // 	return $this->belongsTo('App\Listing','listing_id');
    // }
    // public function review($value='')
    // {
    // 	return $this->hasMany('App\Review');
    // }
    // public function user($value='')
    // {
    //     return $this->belongsTo('App\user');
    // }
}


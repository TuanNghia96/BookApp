<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "Bill";

    public $dateTime = false;
    public $timestamps = false;

    public function billDetail(){
    	return $this->hasMany('App\BillDetail','id_bill','id');

    }


}

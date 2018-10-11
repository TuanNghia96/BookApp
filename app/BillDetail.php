<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_detail";

    public $dateTime = false;
    public $timestamps = false;

    public function bill(){
    	return $this->belongsTo('App\Bill','id_bill','id');
    }
    public function phone(){
    	return $this->belongsTo('App\Phone','id_phone','id');
    }
}

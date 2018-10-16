<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use App\Phone;
use App\Bill;
use App\BillDetail;
use App\Post;

class myController extends Controller
{
    //view Home
    public function getView(){
        $response = new Response();
        if(!Session::get('id')){
            $bill = new Bill;
            if($bill->save()){
                Session::put('id',$bill->id);
                Session::put('number',0);
            }
        }else{
            $owe = BillDetail::where('id_bill','=',Session::get('id'))->where('id_phone','=',6);
            $billDetail = Bill::find(1)->billDetail;
        }

        $billDetail = Bill::find(1)->billDetail;
		$phones = Phone::orderBy('id', 'desc')->simplePaginate(6) ;  
    	return view('admin',["phones"=>$phones,'bill'=>$billDetail]);
    }
    //view show
    public function getShow($id){
        $check = 0;
    	$phone = Phone::find($id);
        if (Bill::find(Session::get('id'))->billDetail()->where('id_phone','=',$id)->first()) {
            $check = 1;
        }
    	return view('show',['phone'=>$phone,'check'=>$check]);
    }
    public function postComment(Request $request){
    	$post = new Post;

        $post->name    = $request->name;
        $post->email   = $request->email;
        $post->text = $request->text;
        $post->create_at  = date('Y-m-d H:i:s');    ;
        $post->save();
        return redirect()->route('home');
    }

    public function getSearch(){
        $phones = Phone::all();
        return view('search',['phones'=>$phones]);
    }

    public function postSearch(Request $request){
        $search = array();
        if ($request->name != ""){
            $phones = Phone::where('name','LIKE','%'.$request->name.'%')->get();
            $search[ 'Tên điện thoại:'] = $request->name;
        }else{
        $phones = Phone::all();
        }
        if ($request->type != "") {
        $phones = $phones->where('made',$request->type);
        $search['Loại:'] = $request->type;
        }
        //Tim theo gia
        if ($request->cost != "") {
            $search['Lớn hơn:']=1000000*$request->cost[0];
            $phones = $phones->where('cost','>',1000000*$request->cost[0]);
            if ( strlen($request->cost) == 3) {
                $search['Nhỏ hơn:']=1000000*$request->cost[2];
                $phones = $phones->where('cost','<',1000000*$request->cost[2]);
            }
        }
        return view('search',['phones'=>$phones,'request'=>$search]);
    }

    //AddBill

    public function postPhone(Request $request){
        if(!BillDetail::where('id_bill',Session::get('id'))->where('name',$request->name)->where('color',$request->color)->update(['number'=>$request->number,'cost'=>($request->cost*$request->number)])){
            $billDetail = new BillDetail;
            
            $billDetail->id_bill = Session::get('id');
            $billDetail->id_phone = $request->id;
            $billDetail->name = $request->name;
            $billDetail->cost = $request->cost*$request->number;
            $billDetail->number = $request->number;
            $billDetail->color = $request->color;
            if($billDetail->save()){
                $number = BillDetail::where('id_bill',Session::get('id'))->count();
                Session::put('number',$number);
                return redirect()->route('home');
            }
        }else{
            BillDetail::where('id_bill',Session::get('id'))->where('name',$request->name)->where('color',$request->color)->update(['number'=>$request->number,'cost'=>($request->cost*$request->number)]);
            return redirect()->route('home');
        }
    
}

    public function deleteBillDetail($id){
        if(BillDetail::destroy($id)){
            $number = BillDetail::where('id_bill',Session::get('id'))->count();
                Session::put('number',$number);
            return redirect()->route('getBill');
        }
    }



    public function getBill(){
        if (is_null(Session::get('id'))) {
            return redirect()->route('home');
        }else{
            $bill = Bill::find(Session::get('id'));
            if ($bill->status=="processing") {
                $status = 1;
            }else
                $status = 0;
            $billDetail = $bill->billDetail()->get();
            $money = 0;
            foreach ($billDetail AS &$value) {
                $money += $value->cost;
            }
            $bill->cost = $money;
            $bill->save();
            return view('bill',['billDetail'=>$billDetail,'cost'=>$money,'status'=>$status]);
        }
    }
    public function postBill(Request $request){
        $bill = Bill::find(Session::get('id'));
        $bill->name = $request->name;
        $bill->phone_number = $request->phone_number;
        if ($request->address !="") {
        $bill->address = $request->address;
        }else
        $bill->address = "nothing";
        $bill->status = 'processing';
        $bill->create_at = date('Y-m-d H:i:s');
        if($bill->save())
        return redirect()->route('home');

    }
}


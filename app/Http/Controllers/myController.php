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
    public function getView(){
        $response = new Response();
        if(!Session::get('id')){
            $bill = new Bill;
            if($bill->save()){
                Session::put('id',$bill->id);
            }
        }

        $billDetail = Bill::find(1)->billDetail;
		$phones = Phone::simplePaginate(6);  
    	return view('admin',["phones"=>$phones,'bill'=>$billDetail]);
    }
    public function getShow($id){

    	$phone = Phone::find($id);
    	return view('show',['phone'=>$phone]);
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
            $search[ 'Ten:'] = $request->name;
        }else{
        $phones = Phone::all();
        }
        if ($request->type != "") {
            echo "toi la nghia";
        $phones = $phones->where('made',$request->type);
        $search['Loai:'] = $request->type;
        }
        //Tim theo gia
        if ($request->cost != "") {
            $search['Lon hon:']=1000000*$request->cost[0];
            $phones = $phones->where('cost','>',1000000*$request->cost[0]);
            if ( strlen($request->cost) == 3) {
                $search['Nho hon:']=1000000*$request->cost[2];
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
            if($billDetail->save())
                return redirect()->route('home');
        }else
            return redirect()->route('home');
    }

    public function deleteBillDetail($id){
        if(BillDetail::destroy($id))
            return redirect()->route('getBill');
    }



    public function getBill(){
        $bill = Bill::find(Session::get('id'));
        $billDetail = $bill->billDetail()->get();
        $money = 0;
        foreach ($billDetail AS &$value) {
            $money += $value->cost;
        }
        $bill->cost = $money;
        $bill->save();
        return view('bill',['billDetail'=>$billDetail,'cost'=>$money]);
    }
    public function postBill(Request $request){
        // return var_dump($request->);
        $bill = Bill::find(Session::get('id'));
        $bill->name = $request->name;
        $bill->phone_number = $request->phone_number;
        $bill->address = $request->address;
        $bill->status = 'delivering';
        $bill->create_at = date('Y-m-d H:i:s');
        if($bill->save())
        return redirect()->route('home');

    }
}


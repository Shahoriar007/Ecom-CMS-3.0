<?php

namespace App\Http\Controllers;

use App\Models\Orderdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {   


         $invoice = DB::table('invoices')->find($id);
         $orderDetail = DB::table('orderdetails')->where('orderinvoice_id', '=', $id)->get();
         $user_ids = DB::table('orderdetails')->select('user_id')->where('orderinvoice_id', '=', $id)->get();
         $user = DB::table('users')->select('name')->where('id', '=', $user_ids[0]->user_id)->get();
         
         $products = [];
         $total = 0;
         foreach($orderDetail as $item){
            $product = DB::table('products')->find($item->product_id);
            array_push($products,$product);
            $total = $total + ($product->price * $item->quantity);
         }

         $data = [$id,$invoice,$orderDetail,$user,$products,$total];
         return view('orderDetail',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //status change
       
        $all = $request->all();
        $id = $all['order_id'];
        $status = $all['status'];
        DB::table('invoices')
        ->where('id', $id)
        ->update([
            'status' => $status
        ]);


        $invoice = DB::table('invoices')->find($id);
         $orderDetail = DB::table('orderdetails')->where('orderinvoice_id', '=', $id)->get();
         $user_ids = DB::table('orderdetails')->select('user_id')->where('orderinvoice_id', '=', $id)->get();
         $user = DB::table('users')->select('name')->where('id', '=', $user_ids[0]->user_id)->get();
         
         $products = [];
         $total = 0;
         foreach($orderDetail as $item){
            $product = DB::table('products')->find($item->product_id);
            array_push($products,$product);
            $total = $total + ($product->price * $item->quantity);
            $totalStock = DB::table('stocks')->select('totalStock')->where('product_id',$item->product_id)->get();
            
            $availableStock = $totalStock[0]->totalStock - $item->quantity;
           $product =  DB::table('stocks')->where('product_id',$item->product_id)->update(['availableStock'=>$availableStock]);
          
         }

         //inventory update



         $data = [$id,$invoice,$orderDetail,$user[0],$products,$total];
         return view('orderDetail',compact('data'));

        
        //$status = $request->input['order_id'];
        //return view('random',compact('string'));
       
        //end status change
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function show(Orderdetail $orderdetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderdetail $orderdetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orderdetail $orderdetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderdetail $orderdetail)
    {
        //
    }
}

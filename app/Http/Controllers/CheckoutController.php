<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\Logo;
use App\Models\Navbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkoutPage(Request $request){
        $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();
        $cart = $request->session()->get('cart');
        $subTotal = 0;
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            foreach($cart as $item){
                $subTotal = $subTotal + ($item->price * $item->qty);
            }
           
            return view('checkout',compact('catagories','logo','navigation','subTotal','cart'));
        }
        else{
            return view('checkout',compact('catagories','logo','navigation','subTotal','cart'));
        }
            
        
    }
    public function checkout(Request $request){
       
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $city = $request->input('city');
        $zip = $request->input('zip');
        //storing order in order invoice table
        $invoice = new Invoice();
        $invoice['name'] = $name;
        $invoice['email'] = $email;
        $invoice['phone'] = $phone;
        $invoice['address'] = $address;
        $invoice['city'] = $city;
        $invoice['zip'] = $zip;
        $invoice['status'] = "pending";
        $invoice->save();
        
        //stroring order info in order products table
        $cart = $request->session()->get('cart');
        foreach($cart as $item){
            $orderDetail = new Orderdetail();
            $orderDetail['orderinvoice_id'] = $invoice['id'];
            $orderDetail['product_id'] = $item->id;
            $orderDetail['user_id'] = Auth::guard('web')->user()->id;
            $orderDetail['quantity'] = $item->qty;
            $orderDetail['singlePrice'] = $item->price;
            $orderDetail['status'] = "pending";

            //dd($orderDetail['orderinvoice_id'],$orderDetail['product_id'],$orderDetail['user_id'],$orderDetail['quantity'],$orderDetail['singlePrice'],$orderDetail['status']);
            $orderDetail->save();
        }
        //
        $request->session()->forget('cart');
        return response()->json(['hi'=>json_encode('hiiiiiiiiiiiiiiii')]);
        
        
    }
}

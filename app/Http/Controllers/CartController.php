<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Product;
use App\Models\Productimage;
use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
   
    
    
    public function viewCart(Request $request){
        $subTotal = 0;
        $shipping = 150;
        $grandTotal = 0;
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            foreach($cart as $item){
                $subTotal = $subTotal + ($item->price * $item->qty);
            }
            $grandTotal = $subTotal + $shipping;
            return view('shopping_cart', compact('subTotal','shipping','grandTotal'));
        }
        else{
            return view('shopping_cart', compact('subTotal','shipping','grandTotal'));
        }
        
       
    }
    public function addToCart(Request $request){
        //$request->session()->forget('cart');
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');
        $product = Product::find($productId);
        $cartProduct = (object) array(
            'id' => $product->id,
            'name' =>$product->productName,
            'price' => $product->price,
            'thumbnail' => $product->image1,
            'qty' => $quantity
        );
        $oldCart  = $request->session()->has('cart')? $request->session()->get('cart'): null;
        if($oldCart){
            $inCart = false;
            foreach($oldCart as $item){
                if($item->id == $productId){
                    $item->qty++;
                    $inCart = true;
                    break;
                }
            }
            if($inCart){
                $newCart = $oldCart;
            }
            else{

                $newCart = $oldCart;
                array_push($newCart,$cartProduct);

            }
        }
        else{
            $newCart = array($cartProduct);
        }
       
        $request->session()->put('cart', $newCart);
        return response()->json(['cart'=>json_encode($request->session()->get('cart'))]);
        
    }
    public function updateCart(Request $request){
        $productId = $request->input('productId');
        $quantity = $request->input('newQuantity');
        $product = Product::find($productId);
        $cart  = $request->session()->get('cart');
        foreach($cart as $item){
            if($item->id == $productId){
                $item->qty = $quantity ;
                break;
            }
        }
        $request->session()->put('cart', $cart);
        return response()->json(['cart'=>json_encode($cart)]);
        
        

    }
}
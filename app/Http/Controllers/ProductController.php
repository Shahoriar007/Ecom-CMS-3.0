<?php

namespace App\Http\Controllers;

use App\Models\Productimage;
use App\Cart;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Logo;
use App\Models\Navbar;
use App\Models\Stock;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;
use Symfony\Component\HttpFoundation\Session\Session as HttpFoundationSessionSession;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagories = Catagory::all();
        $allProducts = Stock::all();
        
        return view('product',compact('catagories','allProducts'));
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
        
      if($request->file('thumbnail')){
        $thumbnailImage = $request->file('thumbnail');
        $thumbnailImageName= date('YmdHi').$thumbnailImage->getClientOriginalName();
        $thumbnailImage-> move(public_path().'/images', $thumbnailImageName);
        
           $insertedProduct = new Product;
           $insertedProduct['productName'] = $request->productName;
           $insertedProduct['price']= $request->price;
           $insertedProduct['catagory'] = $request->get('catagory');
           $insertedProduct['latest_product'] = $request->get('latest');
           $insertedProduct['top_rated']= $request->get('toprated');
           $insertedProduct['image1'] = $thumbnailImageName;
           $insertedProduct->save();
      }
       

        if($request->file('images')){
        $imageArray = [];
        foreach(($request->file('images')) as $image){
        $file = $image;
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path().'/images', $filename);
        $imageArray = $filename;
        Productimage::create([
            'product_id'=> $insertedProduct['id'],
            'image'=>$imageArray
        ]);

        }
        } 
        
        $catagories = Catagory::all();
        return view('product',compact('catagories'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {   
       


        $images = Product::find($id)->productImage;
        $productDetail = Product::find($id);
        $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();
        return view('product_details', compact('productDetail','images','catagories','logo','navigation')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    // Show all products
    public function showAllProducts()
    {   
        $allProductsData = Product::all();
        $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();
        return view('allProducts', compact('allProductsData','catagories','logo','navigation')) ;
    }
    
   
}

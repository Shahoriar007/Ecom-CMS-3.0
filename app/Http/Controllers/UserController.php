<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Orderdetail;
use App\Models\User;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Logo;
use App\Models\Navbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\PasswordReset;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function orders(){
        $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();
        $user_id = Auth::guard('web')->user()->id;
        $orders = Invoice::where('user_id',$user_id)->get();
        //dd($orders);
        
        return view ( 'userOrders',compact('orders','catagories','logo','navigation'));

    }
    public function address(){
        $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();
        $user_id = Auth::guard('web')->user()->id;
        $user = User::where('id',$user_id)->get();
        //dd($user[0]->address);
        
        
        return view('userAddress',compact('user','catagories','logo','navigation'));
        
    }
    public function details()
    {
        $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();
        return view('userDetails',compact('catagories','logo','navigation'));
    }

    public function changeDetails(Request $request)
    {
        $input = $request->all();
        $first_name = $input['first-name'];
        $last_name = $input['last-name'];
        $email = $input['email'];
        $current_pwd = $input['current-pwd'];
        $new_pwd = $input['new-pwd'];

       /* $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);*/
        $id = Auth::guard('web')->user()->id;
        $user = User::find($id);
        $user['name'] = $first_name . " " . $last_name;
        $user['email'] = $email;
        $user['password'] = Hash::make($new_pwd);
        $user['remember_token'] = Str::random(60);
        $user->save();
        
        /*$status = Password::reset(
            $request->only('email', 'new_pwd', 'confirm_pwd', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );*/
        $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();
        return view('dashboard',compact('catagories','logo','navigation'));
        /*return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);*/

        
    }
    public function viewDashboard(){
        $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();
        return view('dashboard',compact('catagories','logo','navigation'));
    }

    public function viewOrder($id){

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
        $data = array(
           "user"=>$user[0],
           "invoice"=>$invoice,
           "products"=>$products,
           "orderDetail"=>$orderDetail,
           "total"=>$total
       );
       return view('generate_invoice',compact('data'));
       
   }
   public function editAddress(Request $request){
    $address = $request->input('address');
    $city = $request->input('city');
    $phone = $request->input('phone');
    $user_id = Auth::guard('web')->user()->id;
    $user = User::find($user_id);
    $user->address = $address;
    $user->city = $city;
    $user->phone = $phone;
    $user->save();

    $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();

        $user_id = Auth::guard('web')->user()->id;
        $user = User::where('id',$user_id)->get();
        return view('userAddress',compact('user','catagories','logo','navigation'));

   }
}

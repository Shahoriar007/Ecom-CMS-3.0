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

class UserController extends Controller
{
    public function orders(){
        $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();
        $user_id = Auth::guard('web')->user()->id;
        $order_ids = Orderdetail::where('user_id',$user_id)->get();
        $orders = [];
        if(count($order_ids) > 0){
            
            foreach($order_ids as $id){
                $order = Invoice::find($id);
                
                array_push($orders,$order);
            }
            
        }
        $unique_orders = array_unique($orders);
        
        return view ( 'userOrders',compact('unique_orders','catagories','logo','navigation'));

    }
    public function address(){
        $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();
        $user_id = Auth::guard('web')->user()->id;
        $order_ids = Orderdetail::where('user_id',$user_id)->get();
        if(count($order_ids) > 0){
            $invoice = Invoice::find($order_ids[0]);
            $order_invoice = $invoice[0];
        }
        
        return view('userAddress',compact('order_invoice','catagories','logo','navigation'));
        
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
        $display_name = $input['display-name'];
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
        return view('dashboard');
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
}

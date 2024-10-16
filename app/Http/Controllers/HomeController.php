<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subscribers;
use Hash;
use App\Models\User;
use App\Models\LoginDetail;
use Auth;
use DB;
use Illuminate\Support\Facades\Http;
class HomeController extends Controller
{
    public function newdashboard()
    {
        return view('newdashboard');
    }
    public function employees()
    {
        $getdata=DB::table('employees')->get();
        return view('home.employees',['getdata'=>$getdata]);
    }
    public function charts()
    {
        $month_wise_login_count=DB::table('logindetail')
        ->selectRaw('email, MONTHNAME(lastlogindate) as Month_Name, COUNT(*) as count')
        ->groupBy('email', 'Month_Name')
        ->get();
        $monthNames = $month_wise_login_count->pluck('Month_Name')->unique()->values()->toArray();
        $count = $month_wise_login_count->pluck('count')->values()->toArray();
        // dd($monthNames,$count);
        return view('home.chart',['monthNames'=>$monthNames,'count'=>$count]);
    }
    public function postcharts()
    {
       
        return view('home.chart');
    }
    public function changepassword()
    {
        return view('home.changepassword');
    }
    public function changepasswordpost(Request $request)
    {
        $request->validate([
            'current_password' => ['required','min:8'],
            'password' => ['required','min:8', 'confirmed']
        ]);
        
        

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if (!$currentPasswordStatus) {
            return response()->json([
                'success' => false,
                'message' => 'Current Password does not match with Old Password'
               
                ],422);
        }
        else{
            User::findOrFail(Auth::user()->id)->update([
                        'password' => Hash::make($request->password),
                     ]);
        
                    return response()->json([
                        'success' => true,
                        'message'=>'Password Updated Successfully']);
        }
        // dd(auth()->user()->password,Hash::make($request->current_password));
        // if($currentPasswordStatus){

        //     
        //     dd("pwd  updated");
        // }else{

        //     
        //     dd("pwd not updated cp!=op");
        // }
    }
    public function tables()
    {
        $totalLogins = DB::table('logindetail')->selectRaw('COUNT(id) as Total_Login, email')
    ->groupBy('email')
    ->get();

    $month_wise_login_count=DB::table('logindetail')
    ->selectRaw('email, MONTHNAME(lastlogindate) as Month_Name, COUNT(*) as count')
    ->groupBy('email', 'Month_Name')
    ->get();
    
        
           return view('home.tables',['totalLogins'=>$totalLogins,
           'month_wise_login_count'=>$month_wise_login_count]);
    }
    public function products()
    {
        $response = Http::get('https://dummyjson.com/products/10');

        // Check if the request was successful
        if ($response->successful()) {
            $product = $response->json(); // Decode the JSON response
            // dd($product->image);
            $description = $product['description']; // Get the product description
            $title = $product['title'];
            $image = $product['thumbnail'];
            $price = $product['price'];
            return view('home.products', ['description'=>$description,'title'=>$title,'image'=>$image,'price'=>$price]); // Pass the description to the view
        }
    }
    public function productspost($id)
    {
        
        
        $response = Http::get('https://dummyjson.com/products/'.$id);

    // Check if the request was successful
    if ($response->successful()) {
        $product = $response->json(); // Decode the JSON response
        // dd($product->image);
        $description = $product['description']; // Get the product description
        $title = $product['title'];
        $image = $product['thumbnail'];
        $price = $product['price'];
        return view('home.products', ['description'=>$description,'title'=>$title,'image'=>$image,'price'=>$price]); // Pass the description to the view
    }

    }
}

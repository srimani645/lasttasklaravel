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

        return view('home.chart');
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
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password Updated Successfully');

        }else{

            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }
    }
    public function tables()
    {
           return view('home.tables');
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

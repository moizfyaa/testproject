<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index()
    {
        $usertype = Auth::user()->usertype ??  'usertype not found';

        if ($usertype == '1')
        {
            return redirect()->route('dashboard');
        }

        else
        {
        $products = Product::all();
        return view('home', compact('products'));
      }
   }

    public function addToCart($id)
    {
        if(Auth::id())
        {
            $user = auth()->user();
            
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully');
      }
      else
      {
         return redirect('login');
      }
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function placeorder(Request $request)
    {
        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Order Placed Requst Send Successfully');
    }
  
}

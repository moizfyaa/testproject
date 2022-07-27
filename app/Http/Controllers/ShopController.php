<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function shop_detail($id)
    {
        $data = Product::find($id);
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $data->name,
                "quantity" => 1,
                "price" => $data->price,
                "image" => $data->image
            ];
        }
          
        session()->put('cart', $cart);
        return view('shop-details', compact('data'));
    }

    public function shopping_cart()
    {
        if(Auth::id())
        {
            return view('shopping-cart');
        }

        else
        {
            return redirect('login');
        }
    }

    public function check_out()
    {
        return view('checkout');
    }

    public function addproductpage()
    {
        if(Auth::id())
        {
         if(Auth::user()->usertype=='1')
         {
            return view('admin.addproduct');
         }
         else
         {
            return redirect()->back();
         }
        }
        else
        {
            return redirect('login');
        }
    }

    public function addproduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $data=new Product;
        
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename=time() .'.'. $extension;
        $image->move('uploads/product/',$filename);
        $data->image = $filename;        

        $data->name=$request->name;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect()->route('showproduct')->with('success', 'Product Added Successfully');
   }

   public function showproduct()
   {
    if(Auth::id())
    {
     if(Auth::user()->usertype=='1')
     {
        $data = Product::all();
        return view('admin.showproduct', compact('data'));
     }
     else
     {
        return redirect()->back();
     }
    }
    else
    {
        return redirect('login');
    }
   }

   public function deleteproduct($id)
   {
       $data = Product::find($id);
       $data->delete();
       return redirect()->back()->with('success', 'Product Deleted Successfully');
   }

   public function update_product_view($id)
   {
        $data = Product::find($id);
        return view('admin.update_product_view', compact('data'));
   }

   public function updateproduct(Request $request,Product $product)
   {

    $request->validate([
        'name' => 'required',
        'price' => 'required',
        'description' => 'required',
        'image' => 'required|image',
    ]);


    $image = $request->file('image');
       $extension = $image->getClientOriginalExtension();
       $filename=time() .'.'. $extension;
       $image->move('uploads/product/',$filename);
       $request->image = $filename;  

    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $filename,
    ]);

       return redirect()->route('showproduct')->with('success', 'Product Updated Successfully');
     }
}

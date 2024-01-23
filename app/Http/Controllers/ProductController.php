<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('show_products' , compact('products'));
    }

    public function add_product(){
        $categories = Category::all();
        return view('add_product',compact('categories'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:products,name',
            'price'=>'required|max:9|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
            'quantity'=>'required|numeric'
         ]);

         $product = new Product;
         $product->name = $request->name;
         $product->description = $request->description;
         $product->price = $request->price;
         $product->quantity = $request->quantity;
         $product->save();
         if ($request->category) {
            $product->categories()->attach($request->category);
         }
         
         return redirect()->route('view_all_products')->with('success','Product Added Successfully');
         
    }

    public function more_details($id){
        $product = Product::with('categories')->find($id);
        return view('more_details',compact('product'));
    }

    public function edit_product($id){
        $product = Product::with('categories')->find($id);
        $categories = Category::all();
        $checked = [];
        foreach ($categories as $category) {
           foreach ($category->products as $product_id) {
                if($product_id->pivot->product_id == $product->id){
                    $checked[] = $product_id->pivot->category_id;
                }
           }
        }
        
        return view('edit_product',compact('product','categories','checked'));
    }


    public function upload_product(Request $request , $id){
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required|max:9|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
            'quantity'=>'required|numeric'
         ]);

         $product = Product::find($id);
         $product->name = $request->name;
         $product->description = $request->description;
         $product->price = $request->price;
         $product->quantity = $request->quantity;
         $product->save();
        
        $product->categories()->sync($request->category);
        

         return redirect()->route('view_all_products')->with('success_edit','Product Edited Successfully');

    }

    public function delete_product($id){
        $product = Product::find($id);
        $product->delete();
    }
}

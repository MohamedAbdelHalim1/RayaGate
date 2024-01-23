<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.show_categories' , compact('categories'));
    }

    public function add_category(){
        $products = Product::all();
        return view('category.add_category',compact('products'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
         ]);

         $category = new Category;
         $category->name = $request->name;
         $category->save();
         if ($request->product) {
            $category->products()->attach($request->product);
         }
         
         return redirect()->route('view_all_categories')->with('success','Category Added Successfully');
         
    }

    public function more_details($id){
        $category = Category::with('products')->find($id);
        return view('category.more_details',compact('category'));
    }

    public function edit_category($id){
        $category = Category::with('products')->find($id);
        $products = Product::all();
        $checked = [];
        foreach ($products as $product) {
           foreach ($product->categories as $category_id) {
                if($category_id->pivot->category_id == $category->id){
                    $checked[] = $category_id->pivot->product_id;
                }
           }
        }
        
        return view('category.edit_category',compact('products','category','checked'));
    }


    public function upload_category(Request $request , $id){
        $this->validate($request,[
            'name'=>'required'
         ]);

         $category = Category::find($id);
         $category->name = $request->name;
         $category->save();
         
        $category->products()->sync($request->product);
       

         return redirect()->route('view_all_categories')->with('success_edit','Category Edited Successfully');

    }

    public function delete_category($id){
        $category = Category::find($id);
        $category->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    public function index(){
        //TODO: get all products
        $products = Product::all();

        return view('product.index', [
            'products' => $products
        ]);
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        //*Validate
        $messages = makeMessages();
        $this->validate($request,[
            'name' => ['required',],
            'stock' => ['required',],
            'price' => ['required',],
        ], $messages);
        //*Create
        Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);
        //*Redirect
        return redirect()->route('products');
    }

    public function show($id){
        $product = Product::find($id);
        return view('product.edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, $id){
        
        //*Validate
        $messages = makeMessages();
        $this->validate($request,[
            'name' => ['required',],
            'stock' => ['required',],
            'price' => ['required',],
        ], $messages);

        $product = Product::find($id);

        if($product){
            //*Update
            $product->name = $request->name;
            $product->stock = $request->stock;
            $product->price = $request->price;

            $product->save();

            //*Redirect
            return redirect()->route('products')->with('success', 'the product has been updated');
        }
    }

    public function destroy($id){
        $product = Product::find($id);

        if(!$product){
            return redirect()->route('products')->with('error', 'the product does not exist');
        }

        $product->delete();

        return redirect()->route('products')->with('success', 'product successfully removed');
    }
}

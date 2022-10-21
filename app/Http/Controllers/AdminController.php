<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function AdminView(){
        return view('admin.admin');
    }

    public function AddProduct(ProductRequest $request){

        $product = new Product();
        $product->name = $request->input('name');
        $product->category = $request->input('category');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        if ($request->hasfile('file')){
            $path = $request->input('file')->store('uploads', 'public');
            $product->file_url = '/storage/'.$path;
        }
        dd($product->file_url);
        $product->status = $request->input('status');
        $product->save();
        return redirect()->back()-with('success', 'The product was successfuly added');
    }
}

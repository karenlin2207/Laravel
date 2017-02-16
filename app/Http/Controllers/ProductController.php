<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;


class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();
    	// return view('product.index', compact('products'));
        return response()->json(Product::all());
    }

    public function create()
    {
    	return view('product.create');
    }

    public function store(Request $request)
    {
        $file = Input::file('user_icon_file');
        $extension = $file->getClientOriginalExtension();
        $file_name = strval(time()).str_random(5).'.'.$extension;

        $destination_path = public_path().'/uploads/';

        if (Input::hasFile('user_icon_file')) {
            $upload_success = $file->move($destination_path, $file_name);
        }
        $request['img_uri'] = '/uploads/'. $file_name;
        $request['short_describe'] = 'test';
        $request['category_id'] = 1;
        if($request['is_show']!=1) {$request['is_show']=0;}
        $request->user()->products()->create($request->all());

        return redirect('/admin/products');
    }

    public function edit(Product $product)
    {
    	return view('product.edit', compact('product'));
    }

    public function show()
    {
    	return view('product.show');
    }

    public function update(Request $request, Product $product)
    {
        $request = $request->all();
        $file = Input::file('user_icon_file');
        if ($file){
            $extension = $file->getClientOriginalExtension();
            $file_name = strval(time()).str_random(5).'.'.$extension;
            $destination_path = public_path().'/uploads/';

            if (Input::hasFile('user_icon_file')) {
                $upload_success = $file->move($destination_path, $file_name);
            }
            $request['img_uri'] = '/uploads/'. $file_name;
        }
        $request['short_describe'] = 'test';
        if($request['is_show']!=1) {$request['is_show']=0;}
        $product = Product::find($product->id);
        $product->update($request);

        return redirect('/admin/products');
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect('/admin/products');
    }
}

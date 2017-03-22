<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;


class ProductController extends Controller
{
    public function index()
    {
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

        if (isset($request['is_show'])) {
            $request['is_show'] = true;
        } else {
            $request['is_show'] = false;
        }

        $product = $request->user()->products()->create($request->all());

        $tags = explode(',', $request->get('tags'));

        $product->tag($tags);


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

        if (isset($request['is_show'])) {
            $request['is_show'] = true;
        } else {
            $request['is_show'] = false;
        }
        
        if ($request['tags']!='') {
            $tags = explode(',', $request['tags']);
            foreach ($tags as $tag) {
                if (trim($tag)==''){
                    $tags = array_pop($tags);
                }
            }
            $product->retag($tags);
        }



        $product = Product::find($product->id);
        $product->update($request);

        return redirect('/admin/products');
    }

    public function changeStatus(Request $request, Product $product){
        $request = $request->all();
        $product->update($request);
    }

    public function delete(Product $product)
    {
        $product->delete();
    }
}

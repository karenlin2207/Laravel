<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Product::where('name', 'like', '%' . $request['search_string'] . '%')->get());
    }

    public function create()
    {
        return view('product.create');
    }

    public function detail(Product $product)
    {
        return view('product.detail', compact('product'));
    }

    public function list()
    {
        $products = Product::where('is_show', true)->get();

        foreach ($products as $product) {
            $product->index = rand(1, 6);
        }

        return view('product.list', compact('products'));
    }

    public function store(Request $request)
    {
        $file = Input::file('user_icon_file');

        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $file_name = strval(time()) . str_random(5) . '.' . $extension;

            $destination_path = public_path() . '/uploads/';

            if (Input::hasFile('user_icon_file')) {
                $upload_success = $file->move($destination_path, $file_name);
            }
            $request['img_uri'] = '/uploads/' . $file_name;
        }

        $product = $request->user()->products()->create($request->all());

        if ($request['tags'] != '') {
            $tags = explode(',', $request['tags']);
            foreach ($tags as $tag) {
                if (trim($tag) == '') {
                    $tags = array_pop($tags);
                }
            }
            $product->tag($tags);
        }


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
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $file_name = strval(time()) . str_random(5) . '.' . $extension;
            $destination_path = public_path() . '/uploads/';

            if (Input::hasFile('user_icon_file')) {
                $upload_success = $file->move($destination_path, $file_name);
            }
            $request['img_uri'] = '/uploads/' . $file_name;
        }

        if (isset($request['is_show'])) {
            $request['is_show'] = true;
        }
        else {
            $request['is_show'] = false;
        }

        if ($request['tags'] != '') {
            $tags = explode(',', $request['tags']);
            foreach ($tags as $tag) {
                if (trim($tag) == '') {
                    $tags = array_pop($tags);
                }
            }
            $product->retag($tags);
        }



        $product = Product::find($product->id);
        $product->update($request);

        return redirect('/admin/products');
    }

    public function changeStatus(Request $request, Product $product)
    {
        $request = $request->all();
        $product->update($request);
    }

    public function delete(Product $product)
    {
        $product->delete();
    }
}

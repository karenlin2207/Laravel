<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Illuminate\Support\Facades\Input;

class SliderController extends Controller
{
    public function index()
    {
        return response()->json(Slider::all());
    }

    public function create()
    {
    	return view('slider.create');
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

        if (isset($request['is_show'])) {
            $request['is_show'] = true;
        } else {
            $request['is_show'] = false;
        }

        Slider::create($request->all());

        return redirect('/admin/sliders');
    }

    public function edit(Slider $slider)
    {
    	return view('slider.edit', compact('slider'));
    }

    public function show()
    {
    	return view('slider.show');
    }

    public function update(Request $request, Slider $slider)
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

        $slider = Slider::find($slider->id);
        $slider->update($request);

        return redirect('/admin/sliders');
    }

    public function delete(Slider $slider)
    {
        $slider->delete();
        return redirect('/admin/sliders');
    }

    public function changeStatus(Request $request, Slider $slider){
        $request = $request->all();
        $slider->update($request);
    }
}

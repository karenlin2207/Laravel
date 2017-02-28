<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Slider;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('is_show', '1')->limit(10)->get();
        $sliders = Slider::where('is_show', '1')->limit(5)->get();
        return view('welcome', compact('articles', 'sliders'));
    }

    public function admin()
    {
        return view('home');
    }
}

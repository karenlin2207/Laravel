<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Input;
use SEOMeta;
use OpenGraph;
use Twitter;

class ArticleController extends Controller
{
    //
    public function index($type){
        return response()->json(Article::where('type', $type)->get());
    }
    public function newIndex()
    {
        return view('article.index', [
            'type' =>'最新消息',
            'type_enum' => 'new'
            ]);
    }
    public function newCreate()
    {
        return view('article.create', [
            'type' => '最新消息',
            'type_enum' => 'new'
            ]);
    }

    public function promotionIndex()
    {
        return view('article.index', [
            'type' =>'口碑分享',
            'type_enum' => 'promotion'
            ]);
    }
    public function promotionCreate()
    {
        return view('article.create', [
            'type' => '口碑分享',
            'type_enum' => 'promotion'
            ]);
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


        $article = $request->user()->articles()->create($request->all());

        if ($request['tags']!='') {
            $tags = explode(',', $request['tags']);
            foreach ($tags as $tag) {
                if (trim($tag)==''){
                    $tags = array_pop($tags);
                }
            }
            $article->tag($tags);
        }

        return redirect('/admin/articles/'.$request->type.'s');
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function show()
    {
        return view('article.show');
    }

    public function detail(Article $article)
    {

        SEOMeta::setTitle($article->title);
        SEOMeta::setDescription($article->short_describe);
        SEOMeta::addKeyword($article->tagNames());

        //OpenGraph::setUrl('http://current.url.com');
        OpenGraph::setTitle($article->title);
        OpenGraph::setDescription($article->short_describe);
        OpenGraph::addProperty('type', 'articles');

        $article->article_time = date('Y-m-d', strtotime($article->updated_at));
        return view('article.detail', compact('article'));
    }

    public function listNew()
    {
        $articles = Article::where('type', 'new')->get();
        foreach ($articles as $article) {
            $article->article_time = date('Y-m-d', strtotime($article->updated_at));
        }

        return view('article.list', compact('articles'));
    }

    public function listPromotion()
    {
        $articles = Article::where('type', 'promotion')->get();
        foreach ($articles as $article) {
            $article->article_time = date('Y-m-d', strtotime($article->updated_at));
        }

        return view('article.list', compact('articles'));
    }

    public function update(Request $request,Article $article)
    {
        $file = Input::file('user_icon_file');
        $request = $request->all();
        if ($file){
            $extension = $file->getClientOriginalExtension();
            $file_name = strval(time()).str_random(5).'.'.$extension;
            $destination_path = public_path().'/uploads/';

            if (Input::hasFile('user_icon_file')) {
                $upload_success = $file->move($destination_path, $file_name);
            }
            $request['img_uri'] = '/uploads/'. $file_name;
        }

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
            $article->retag($tags);
        }

        $article = Article::find($article->id);
        $article->update($request);
        return redirect('/admin/articles/'.$article->type.'s');
    }

    public function delete(Article $article){
        $article->delete();
    }

    public function changeStatus(Request $request, Article $article){
        $request = $request->all();
        $article->update($request);
    }
}

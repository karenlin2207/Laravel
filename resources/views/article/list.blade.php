@extends('layouts.page')

@section('content')
    <div id="main" class="container">
        <div class="row">
            <div class="col-sm-offset-1">
                <div class="col-sm-12">
                    <div class="title">
                        <i class="fa fa-newspaper-o fa-fw" aria-hidden="true"></i>&nbsp;{{$type}}
                    </div>
                </div>

                @for($i=0;$i<4;$i++)
                    <div class="col-sm-3">
                        @foreach($articles as $article)
                            @if($loop->index%4===$i)
                                <div class="panel-default article">
                                    <a href="/articles/{{$article->id}}">
                                        {{--<div class="panel-heading">--}}
                                            {{--<h1 class="panel-title">--}}
                                                {{--{{$article->title}}--}}
                                                 {{--{{$article->article_time}}--}}
                                            {{--</h1>--}}
                                        {{--</div>--}}
                                        <div class="panel-content">
                                            <p>{{$article->short_describe}}</p>
                                            <img class="title_img" src="{{ $article->img_uri }}">
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endfor
            </div>
            <div class="col-md-12 text-center">
                <div class="pagination"> {{ $articles->links() }} </div>
            </div>
        </div>
    </div>
@endsection

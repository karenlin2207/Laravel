@extends('layouts.page')

@section('content')
<div id="main" class="container">
	<div class="row">
		<div class="col-sm-offset-1">
			@foreach($articles as $article)
			<div class="panel-default col-sm-4">
				<a href="/articles/{{$article->id}}">
				<div class="panel-heading">
					<h1 class="panel-title pull-left">{{$article->title}}</h1>
					<h6 class="panel-title pull-right">{{$article->article_time}}</h6>
				</div>
				<div class="panel-content">
					{{$article->short_describe}}
					<img class="title_img" src="{{ $article->img_uri }}">
				</div>
				</a>
			</div>
			@endforeach
		</div>
		<div class="col-md-12 text-center">
			<div class="pagination"> {{ $articles->links() }} </div>
		</div>
	</div>
</div>
@endsection

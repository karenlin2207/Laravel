@extends('layouts.page')

@section('content')
<div id="main" class="container">
	<div class="row">
		<div class="col-sm-offset-2">
			@foreach($articles as $article)
			<div class="panel-default col-sm-9">
				<div class="panel-heading">
					<h1 class="panel-title pull-left">{{$article->title}}</h1>
					<h6 class="panel-title pull-right">{{$article->article_time}}</h6>
				</div>
				<div class="panel-content">
					<div class="col-sm-6">
						{{$article->short_describe}}
					</div>
					<div class="col-sm-6">
						<img src="{{ $article->img_uri }}">
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection

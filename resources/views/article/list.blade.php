@extends('layouts.page')

@section('content')
<div id="main" class="container">
	<div class="row">
		<div class="col-sm-offset-2">
			@foreach($articles as $article)
			<div class="inner">
				<div class="col-sm-10">
					<div class="col-sm-12 title">
						<div class="col-sm-9">
						<h1 clss="bold">{{$article->title}}</h1>
						</div>
						<div class="col-sm-3">
						<h1>{{$article->article_time}}</h1>
						</div>
					</div>
					<div class="col-sm-12">
						<img src="/uploads/{{ $article->img_uri }}">
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection

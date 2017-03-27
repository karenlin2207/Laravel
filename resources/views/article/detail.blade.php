@extends('layouts.page')

@section('content')
<div id="main" class="container">
	<div class="row">
		<div class="col-sm-offset-2">
			<div class="panel-default col-sm-9">
				<div class="panel-heading">
					<h1 class="panel-title pull-left">{{$article->title}}</h1>
					<h6 class="panel-title pull-right">{{$article->article_time}}</h6>
				</div>
					<div class="col-sm-9">
						{!! $article->describe !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

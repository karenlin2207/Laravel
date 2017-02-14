@extends('layouts.main')

@section('content')
<div id="main">
	<div class="inner">
		<h1>{{$article->title}}</h1>
		{!! $article->describe !!}
	</div>
</div>
@endsection

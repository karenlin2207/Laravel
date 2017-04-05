@extends('layouts.page')

@section('content')
<link rel="stylesheet" href="/assets/css/main.css">
<div id="main" class="container">
	<div class="row">
		<div class="col-sm-offset-2">
			<div class="tiles">
			@foreach($products as $product)
				<article class="style{{$product->index}}">
					<span class="image">
						<img src="{{ $product->img_uri }}" alt="">
					</span>
					<a href="/products/{{$product->id}}">
						<h2>{{$product->name}}</h2>
						<div class="content">
						</div>
					</a>
				</article>
			@endforeach
			</div>	
		</div>
	</div>
</div>
@endsection

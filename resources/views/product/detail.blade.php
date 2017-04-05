@extends('layouts.page')

@section('content')
<link rel="stylesheet" href="/assets/css/main.css">
<div id="main" class="container">
	<div class="row">
		<div class="col-sm-offset-2">
			<div class="tiles">
				<article class="style1">
					<span class="image">
						<img src="{{ $product->img_uri }}" alt="">
					</span>
					<a href="generic.html">
						<h2>{{$product->name}}</h2>
						<div class="content">
							{!$product->describe!}
						</div>
					</a>
				</article>
			</div>	
		</div>
	</div>
</div>
@endsection

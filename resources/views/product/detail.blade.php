@extends('layouts.page')

@section('content')
<div id="main" class="container">
	<div class="row">
		<div class="col-sm-offset-2">
			<div class="inner">
				<div class="col-sm-9">
					<div class="col-sm-12 title">
						<div class="col-sm-9">
						<h1 clss="bold">{{$product->title}}</h1>
						</div>
						<div class="col-sm-3">
						<h1>{{$product->product_time}}</h1>
						</div>
					</div>
					<div class="col-sm-9">
						{!! $product->describe !!}
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection

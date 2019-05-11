@extends('admin.layout.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<img class="card-img-top" src="{{ asset('images/products/'.$product->image) }}" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title mb-3">{{ $product->name }}</h4>
						<p class="card-text">Detail : {{ $product->details }}</p>
						<p class="card-text">Price : {{ $product->presentPrice() }}</p>
						<p class="card-text">Description : {{ $product->description }}</p>
						<a href="{{ route('product.index') }}" class="mt-5 btn btn-xs btn-primary pull-right">Back</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
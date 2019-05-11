@extends('admin.layout.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		@include('admin.layout.partials._alert')
	</div>
</div>
<div class="row">
<div class="col-md-12">
	<!-- DATA TABLE -->
	<h3 class="title-5 m-b-35">Products</h3>
	<div class="table-data__tool">
		<div class="table-data__tool-right">
			{{-- <button class="au-btn au-btn-icon au-btn--green au-btn--small"> --}}
				<a href="{{ route('product.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
						<i class="zmdi zmdi-plus"></i>add product</button>
				</a>
		</div>
	</div>
	<div class="table-responsive table-responsive-data2">
		<table class="table table-data2">
			<thead>
				<tr>
					<th></th>
					<th>name</th>
					<th>details</th>
					<th>description</th>
					<th>price</th>
					<th></th>
				</tr>
			</thead>
			<tbody>

				@forelse ($products as $product)
				<tr class="tr-shadow">
						<td style="width: 134px; height: 81.5px; position: relative; overflow: hidden">
							<img src="{{ asset('images/products/'.$product->image) }}" alt="{{ $product->name }}">
						</td>
						<td>{{ $product->name }}</td>
						<td class="desc">{{ $product->details }}</td>
						<td>{{ str_limit($product->description, 30, ' ...') }}</td>
						<td>{{ $product->presentPrice() }}</td>
						<td>
							<form action="{{ route('product.destroy', $product) }}" method="post">
								{{ csrf_field() }}
								<div class="table-data-feature">
									<a href="{{ route('product.show', $product->slug) }}" class="item" data-toggle="tooltip" data-placement="top" title="See Detail">
										<i class="zmdi zmdi-eye"></i>
									</a>
									<a href="{{ route('product.edit', $product->slug) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
										<i class="zmdi zmdi-edit"></i>
									</a>
									{{ method_field('DELETE') }}
									<button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete"
										<i class="zmdi zmdi-delete"></i>
									</button>
								</div>
							</form>
						</td>
					</tr>
					<tr class="spacer"></tr>
					@empty
					<div class="row justify-content-center">
						<div class="col-md-6 text-center">
							<div class="alert alert-danger" role="alert">
								No Product Data
							</div>
						</div>
					</div>
				@endforelse


			</tbody>
		</table>
	</div>
	<!-- END DATA TABLE -->
</div>
</div>

<div class="row pull-right">
	<div class="col-md-12">
		{!! $products->render() !!}
	</div>
</div>
@endsection
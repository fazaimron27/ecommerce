@extends('admin.layout.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		@include('admin.layout.partials._alert')
	</div>
</div>
<div class="col-md-12">
	<!-- DATA TABLE -->
	<h3 class="title-5 m-b-35">categories</h3>
	<div class="table-data__tool">
		<div class="table-data__tool-right">
			{{-- <button class="au-btn au-btn-icon au-btn--green au-btn--small"> --}}
				<a href="{{ route('category.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
						<i class="zmdi zmdi-plus"></i>add category</button>
				</a>
		</div>
	</div>
	<div class="table-responsive table-responsive-data2">
		<table class="table table-data2">
			<thead>
				<tr>
					<th>Category name</th>
					<th></th>
				</tr>
			</thead>
			<tbody>

				@forelse ($categories as $category)
				<tr class="tr-shadow">
						<td>{{ $category->name }}</td>
						<td>
							<form action="{{ route('category.destroy', $category) }}" method="post">
								{{ csrf_field() }}
								<div class="table-data-feature">
									<a href="{{ route('category.edit', $category->slug) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
										<i class="zmdi zmdi-edit"></i>
									</a>
									{{ method_field('DELETE') }}
									<button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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
								No Category Data
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

<div class="container">
	<div class="container">
		<div class="row pull-right">
			<div class="col-md-12">
				{!! $categories->render() !!}
			</div>
		</div>
	</div>
</div>
@endsection
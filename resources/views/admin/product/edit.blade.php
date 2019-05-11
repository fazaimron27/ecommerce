@extends('admin.layout.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<strong>Edit</strong> Product
				</div>
				<div class="card-body card-block">
					<form action="{{ route('product.update', $product) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="text-input" class="form-control-label">Name</label>
							</div>
							<div class="col-12 col-md-9">
                            	<input type="text" id="name" name="name" placeholder="Input Product Name" class="form-control" value="{{ $product->name }}">
                                {{-- <small class="form-text text-muted">This is a help text</small> --}}
                            </div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="text-input" class="form-control-label">Price</label>
							</div>
							<div class="col-12 col-md-9">
                            	<input type="number" id="price" name="price" placeholder="Input Price of Product" class="form-control" value="{{ $product->price }}">
                                {{-- <small class="form-text text-muted">This is a help text</small> --}}
                            </div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="text-input" class="form-control-label">Details</label>
							</div>
							<div class="col-12 col-md-9">
                            	<input type="text" id="details" name="details" placeholder="Input Detail of Product" class="form-control" value="{{ $product->details }}">
                                {{-- <small class="form-text text-muted">This is a help text</small> --}}
                            </div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="select" class="form-control-label">Category</label>
							</div>
							<div class="col-12 col-md-9">
								<select name="category_id" id="category_id" class="form-control">
									<option>Please select</option>
									{{-- @foreach ($categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach --}}
									@foreach ($categories as $category)
									<option value="{{ $category->id }}"
										@if ($category->id == $product->category_id)
											Selected
										@endif
										>{{ $category->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="textarea-input" class="form-control-label">Description</label>
							</div>
							<div class="col-12 col-md-9">
								<textarea name="description" id="description" rows="9" placeholder="Input Description of Product" class="form-control">{{ $product->description }}</textarea>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="file-input" class=" form-control-label">Change Product Image</label>
							</div>
							<div class="col-12 col-md-9">
								<img src="{{ asset('images/products/'.$product->image) }}" alt="">
								<input type="file" id="image" name="image" class="form-control-file mt-4">
							</div>
						</div>
						<button type="submit" class="btn btn-primary pull-right">
							<i class="zmdi zmdi-eyedropper"></i> Update
						</button>
					</form>
				</div>
				{{-- <div class="card-footer">
					<button type="submit" class="btn btn-primary btn-sm">
						<i class="fa fa-dot-circle-o"></i> Submit
					</button>
					<button type="reset" class="btn btn-danger btn-sm">
						<i class="fa fa-ban"></i> Reset
					</button>
				</div> --}}
			</div>
		</div>
	</div>
@endsection
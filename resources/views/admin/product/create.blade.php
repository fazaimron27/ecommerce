@extends('admin.layout.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<strong>Create New</strong> Product
				</div>
				<div class="card-body card-block">
					<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
						{{ csrf_field() }}
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="text-input" class="form-control-label">Name</label>
							</div>
							<div class="col-12 col-md-9">
                            	<input type="text" id="name" name="name" placeholder="Input Product Name" class="form-control" required>
                                {{-- <small class="form-text text-muted">This is a help text</small> --}}
                            </div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="text-input" class="form-control-label">Price</label>
							</div>
							<div class="col-12 col-md-9">
                            	<input type="number" id="price" name="price" placeholder="Input Price of Product" class="form-control" required>
                                {{-- <small class="form-text text-muted">This is a help text</small> --}}
                            </div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="text-input" class="form-control-label">Details</label>
							</div>
							<div class="col-12 col-md-9">
                            	<input type="text" id="details" name="details" placeholder="Input Detail of Product" class="form-control" required>
                                {{-- <small class="form-text text-muted">This is a help text</small> --}}
                            </div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="select" class="form-control-label">Category</label>
							</div>
							<div class="col-12 col-md-9">
								<select name="category_id" id="category_id" class="form-control" required>
									<option value="">Please select</option>
									@foreach ($categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="textarea-input" class="form-control-label">Description</label>
							</div>
							<div class="col-12 col-md-9">
								<textarea name="description" id="description" rows="9" placeholder="Input Description of Product" class="form-control" required></textarea>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="file-input" class=" form-control-label">Product Image</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="file" id="image" name="image" class="form-control-file" required>
							</div>
						</div>
						<button type="submit" class="btn btn-primary pull-right">
							<i class="zmdi zmdi-eyedropper"></i> Create
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
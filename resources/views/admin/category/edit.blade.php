@extends('admin.layout.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<strong>Edit</strong> Category
				</div>
				<div class="card-body card-block">
					<form action="{{ route('category.update', $category) }}" method="post" class="form-horizontal">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="text-input" class="form-control-label">Name</label>
							</div>
							<div class="col-12 col-md-9">
                            	<input type="text" id="name" name="name" placeholder="Input Category Name" class="form-control" value="{{ $category->name }}" required>
                            </div>
						</div>
						<button type="submit" class="btn btn-primary pull-right">
							<i class="zmdi zmdi-eyedropper"></i> Update
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
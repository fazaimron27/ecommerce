@extends('admin.layout.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<strong>Create New</strong> Category
				</div>
				<div class="card-body card-block">
					<form action="{{ route('category.store') }}" method="post" class="form-horizontal">
						{{ csrf_field() }}
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="text-input" class="form-control-label">Name</label>
							</div>
							<div class="col-12 col-md-9">
                            	<input type="text" id="name" name="name" placeholder="Input Category Name" class="form-control" required>
                            </div>
						</div>
						<button type="submit" class="btn btn-primary pull-right">
							<i class="zmdi zmdi-eyedropper"></i> Create
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
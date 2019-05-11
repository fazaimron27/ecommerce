@extends('admin.layout.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<strong class="card-title mb-3">Profile Card</strong>
				</div>
				<div class="card-body">
					<div class="mx-auto d-block">
						<img class="rounded-circle mx-auto d-block" src="{{asset('admin/images/icon/avatar-01.jpg')}}" alt="Card image cap">
						<h5 class="text-sm-center mt-2 mb-1">{{ Auth::user()->name }}</h5>
						<div class="location text-sm-center">
						<i class="fa fa-envelope"></i> {{ Auth::user()->email }}</div>
					</div>
					<hr>
				</div>
			</div>
		</div>
	</div>
@endsection
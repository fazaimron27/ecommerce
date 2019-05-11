@if (session('success'))
	<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
		<span class="badge badge-pill badge-success">Success</span>
			{{ session('success') }}.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

@if (session('info'))
	<div class="sufee-alert alert with-close alert-info alert-dismissible fade show">
		<span class="badge badge-pill badge-info">Success</span>
		{{ session('info') }}.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

@if (session('danger'))
	<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
		<span class="badge badge-pill badge-danger">Warning</span>
		{{ session('danger') }}.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif
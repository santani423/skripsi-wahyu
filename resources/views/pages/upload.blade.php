<x-Layout.Master title="Upload">

	@slot('breadcrumbRight')
	<div class="ms-auto">
		<a href="#" class="btn-group">
			<button type="button" class="btn btn-primary">Add</button>
		</a>
	</div>
	@endslot

	@slot('body')
	<div class="row">
		<div class="col-xl-12">
			<h6 class="mb-0 text-uppercase"></h6>
			<hr>
			<div class="card">
				<div class="card-body">
					<form action="/upload" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="mb-3">
							<label for="ktp" class="form-label">Upload KTP</label>
							<input type="file" class="form-control" id="ktp" name="ktp" required>
						</div>
						<div class="mb-3">
							<label for="npwp" class="form-label">Upload NPWP</label>
							<input type="file" class="form-control" id="npwp" name="npwp" required>
						</div>
						<div class="mb-3">
							<label for="kk" class="form-label">Upload KK</label>
							<input type="file" class="form-control" id="kk" name="kk" required>
						</div>
						<button type="submit" class="btn btn-success">Upload</button>
					</form>
					<hr>
					<table class="table mb-0">
						<thead>

						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endslot

</x-Layout.Master>

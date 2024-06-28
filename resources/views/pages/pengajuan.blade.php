<x-Layout.Master title="pengajuan">

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
					<form action="/submit-application" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="mb-3">
							<label for="age" class="form-label">Umur</label>
							<input type="number" class="form-control" id="age" name="age" required>
						</div>
						<div class="mb-3">
							<label for="salary" class="form-label">Gaji</label>
							<input type="number" class="form-control" id="salary" name="salary" required>
						</div>
						<div class="mb-3">
							<label for="residential_status" class="form-label">Status Tempat Tinggal</label>
							<input type="text" class="form-control" id="residential_status" name="residential_status" required>
						</div>
						<div class="mb-3">
							<label for="employment_status" class="form-label">Status Kerja</label>
							<input type="text" class="form-control" id="employment_status" name="employment_status" required>
						</div>
						<div class="mb-3">
							<label for="vehicle" class="form-label">Kendaraan</label>
							<select class="form-control" id="vehicle" name="vehicle" required>
								<option value="car">Mobil</option>
								<option value="motorcycle">Motor</option>
								<option value="bicycle">Sepeda</option>
								<option value="none">Tidak Ada</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="loan_term" class="form-label">Jangka Waktu</label>
							<input type="text" class="form-control" id="loan_term" name="loan_term" required>
						</div>
						<button type="submit" class="btn btn-success">Submit</button>
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

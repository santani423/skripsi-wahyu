<x-Layout.Master title="Dosen">

    @slot('breadcrumbRight')
    <div class="ms-auto"> 
        <a href="{{route('dosen-skripsi.create')}}" class="btn-group">
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
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Nama Dosen</th> 
										</tr>
									</thead>
									<tbody>
										@foreach($data as $key => $ds)
										<tr>
											<th scope="row">{{++$key}}</th>
											<td>{{$ds->nama}}</td> 
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div> 
					 
						 
					</div>
				</div>
    @endslot
</x-Layout.Master>
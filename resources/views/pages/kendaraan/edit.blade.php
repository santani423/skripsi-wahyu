<x-Layout.Master title="Edit Kendaraan">

    @slot('breadcrumbRight')
    <div class="ms-auto">
        <!-- Right breadcrumb content -->
    </div>
    @endslot

    @slot('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    Edit Kendaraan
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('kendaraan.update', $kendaraan->id_ketentuan) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="id_rule">ID Rule</label>
                            <input type="text" name="id_rule" class="form-control" value="{{ $kendaraan->id_rule }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="ketentuan">Ketentuan</label>
                            <input type="text" name="ketentuan" class="form-control" value="{{ $kendaraan->ketentuan }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="operator">Operator</label>
                            <input type="text" name="operator" class="form-control" value="{{ $kendaraan->operator }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nilai">Nilai</label>
                            <input type="text" name="nilai" class="form-control" value="{{ $kendaraan->nilai }}">
                        </div>

                        <button type="submit" class="btn btn-success">Update Kendaraan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endslot

</x-Layout.Master>

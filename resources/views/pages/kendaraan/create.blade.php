<x-Layout.Master title="Add Kendaraan">

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
                    Add Kendaraan
                </div>
                <div class="card-body">
                    <form action="{{ route('kendaraan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id_ketentuan" class="form-label">ID Ketentuan</label>
                            <input type="text" class="form-control" id="id_ketentuan" name="id_ketentuan" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_rule" class="form-label">ID Rule</label>
                            <input type="text" class="form-control" id="id_rule" name="id_rule">
                        </div>
                        <div class="mb-3">
                            <label for="ketentuan" class="form-label">Ketentuan</label>
                            <input type="text" class="form-control" id="ketentuan" name="ketentuan" required>
                        </div>
                        <div class="mb-3">
                            <label for="operator" class="form-label">Operator</label>
                            <input type="text" class="form-control" id="operator" name="operator" required>
                        </div>
                        <div class="mb-3">
                            <label for="nilai" class="form-label">Nilai</label>
                            <input type="text" class="form-control" id="nilai" name="nilai" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endslot

</x-Layout.Master>

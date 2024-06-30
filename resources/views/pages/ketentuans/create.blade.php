<x-Layout.Master title="Dashboard">

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
                    Add Ketentuan
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

                    <form action="{{ route('ketentuans.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="id_ketentuan">ID Ketentuan</label>
                            <input type="text" name="id_ketentuan" class="form-control" value="{{ old('id_ketentuan') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="id_rule">ID Rule</label>
                            <input type="text" name="id_rule" class="form-control" value="{{ old('id_rule') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="ketentuan">Ketentuan</label>
                            <input type="text" name="ketentuan" class="form-control" value="{{ old('ketentuan') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="operator">Operator</label>
                            <input type="text" name="operator" class="form-control" value="{{ old('operator') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nilai">Nilai</label>
                            <input type="text" name="nilai" class="form-control" value="{{ old('nilai') }}" required>
                        </div>

                        <button type="submit" class="btn btn-success">Add Ketentuan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endslot

</x-Layout.Master>

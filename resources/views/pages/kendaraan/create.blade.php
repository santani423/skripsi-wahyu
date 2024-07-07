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
                         
                        <div class="form-group mb-3">
                            <label for="id_rule">Rule</label>
                            <select name="id_rule" id="" class="form-control">
                                <option value="">Pilih Rule</option>
                                @foreach($rules as $rule)
                                <option value="{{$rule->id}}">{{$rule->hasil}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="ketentuan">Ketentuan</label>
                            <select name="ketentuan" id="" class="form-control">
                                <option value="">Pilih Ketentuan</option>
                                @foreach($ketentuans as $ketentuan)
                                <option value="{{$ketentuan->id}}">{{$ketentuan->ketentuan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="operator" class="form-label">Operator</label>
                            <input type="text" class="form-control" id="operator" name="operator" required>
                        </div>
                        <div class="mb-3">
                            <label for="nilai" class="form-label">Nilai</label>
                            <input type="text" class="form-control" id="nilai" name="nilai" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_kendaraan" class="form-label">Tahun Kendaraan</label>
                            <input type="number" class="form-control" id="tahun_kendaraan" name="tahun_kendaraan" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_kendaraan" class="form-label">Nama Kendaraan</label>
                            <input type="text" class="form-control" id="nama_kendaraan" name="nama_kendaraan" required>
                        </div>
                        <div class="mb-3">
                            <label for="merek_kendaraan" class="form-label">Merek Kendaraan</label>
                            <input type="text" class="form-control" id="merek_kendaraan" name="merek_kendaraan" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endslot

</x-Layout.Master>
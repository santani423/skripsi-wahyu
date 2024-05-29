<x-Layout.Master title="Mahasiswa">

    <!-- @slot('breadcrumbRight')
    <div class="ms-auto">
        <a href="{{route('mahasiswa.create')}}" class="btn-group">
            <button type="button" class="btn btn-primary">Add</button>
        </a>
    </div>
    @endslot -->

    @slot('body')

    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Pendaftaran Skripsi</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Judul Skripsi 1</label>
                        <input type="text" class="form-control datepicker" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul Skripsi 2</label>
                        <input type="text" class="form-control datepicker" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul Skripsi 3</label>
                        <input type="text" class="form-control datepicker" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul Skripsi 3</label>
                        <input type="text" class="form-control datepicker" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File Skripsi</label>
                        <input type="file" class="form-control datepicker" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bebas biaya administrasi</label>
                        <input type="file" class="form-control datepicker" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bebas pinjaman perpustakaan</label>
                        <input type="file" class="form-control datepicker" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endslot
</x-Layout.Master>
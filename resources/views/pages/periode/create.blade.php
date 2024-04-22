<x-Layout.Master title="Periode">
    @slot('body')
    <div class="row">
        <div class="col-xl-12">
            <h6 class="mb-0 text-uppercase"></h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <!-- Menampilkan pesan error validasi -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulir Tambah Periode -->
                    <form action="{{ route('periode.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun" value="{{ old('tahun') }}">
                                @error('tahun')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="statusSemester" class="col-sm-2 col-form-label">Status Semester</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="statusSemester" name="status_semester" placeholder="Masukkan Status Semester" value="{{ old('status_semester') }}">
                                @error('status_semester')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggalAwal" class="col-sm-2 col-form-label">Tanggal Awal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggalAwal" name="tanggal_awal" placeholder="Masukkan Tanggal Awal" value="{{ old('tanggal_awal') }}">
                                @error('tanggal_awal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggalAkhir" class="col-sm-2 col-form-label">Tanggal Akhir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggalAkhir" name="tanggal_akhir" placeholder="Masukkan Tanggal Akhir" value="{{ old('tanggal_akhir') }}">
                                @error('tanggal_akhir')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" value="{{ old('keterangan') }}">
                                @error('keterangan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
    
    @endslot
</x-Layout.Master>
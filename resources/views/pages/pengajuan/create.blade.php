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
                    Add Pengajuan
                </div>
                <div class="card-body">
                       <!-- Menampilkan pesan error validasi -->
                       @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('pengajuan.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="id_kendaraan" class="form-label">Kendaraan</label>
                            <select name="id_kendaraan" id="id_kendaraan" class="form-control @error('id_kendaraan') is-invalid @enderror">
                                <option value="">Pilih Kendaraan</option>
                                @foreach($kendaraans as $kt)
                                    <option value="{{ $kt->id }}" {{ old('id_kendaraan') == $kt->id ? 'selected' : '' }}>{{ $kt->operator }}</option>
                                @endforeach
                            </select>
                            @error('id_kendaraan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl_bunga" class="form-label">Kendaraan</label>
                            <select name="tgl_bunga" id="tgl_bunga" class="form-control @error('tgl_bunga') is-invalid @enderror">
                                <option value="">Pilih Bunga</option>
                                @foreach($bunga as $kt)
                                    <option value="{{ $kt->id }}" {{ old('tgl_bunga') == $kt->id ? 'selected' : '' }}>{{ $kt->jangka_waktu }}</option>
                                @endforeach
                            </select>
                            @error('tgl_bunga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
                            <input type="date" class="form-control @error('tgl_bayar') is-invalid @enderror" id="tgl_bayar" name="tgl_bayar" value="{{ old('tgl_bayar') }}" required>
                            @error('tgl_bayar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="umur" class="form-label">Umur</label>
                            <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" value="{{ old('umur') }}" required>
                            @error('umur')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Stts_tmpt_tgl">Status Tempat Tinggal</label>
                            <select name="Stts_tmpt_tgl" id="Stts_tmpt_tgl" class="form-control" required>
                                <option value="">Pilih Status Tempat Tinggal</option>
                                <option value="tetap" {{ old('Stts_tmpt_tgl') == 'tetap' ? 'selected' : '' }}>Tetap</option>
                                <option value="kost/kontrak" {{ old('Stts_tmpt_tgl') == 'kost/kontrak' ? 'selected' : '' }}>Kost/Kontrak</option>
                                <option value="ngontrak/kost" {{ old('Stts_tmpt_tgl') == 'ngontrak/kost' ? 'selected' : '' }}>Ngontrak/Kost</option>
                            </select>
                            @error('Stts_tmpt_tgl')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slik" class="form-label">SLIK</label>
                            <input type="text" class="form-control @error('slik') is-invalid @enderror" id="slik" name="slik" value="{{ old('slik') }}" required>
                            @error('slik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gaji" class="form-label">Gaji</label>
                            <input type="number" class="form-control @error('gaji') is-invalid @enderror" id="gaji" name="gaji" value="{{ old('gaji') }}" required>
                            @error('gaji')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="stts_kerja" class="form-label">Status Kerja</label>
                            <select name="stts_kerja" id="stts_kerja" class="form-control @error('stts_kerja') is-invalid @enderror" required>
                                <option value="tetap" {{ old('stts_kerja') === 'tetap' ? 'selected' : '' }}>Tetap</option>
                                <option value="lebih dari setahun" {{ old('stts_kerja') === 'lebih dari setahun' ? 'selected' : '' }}>Lebih dari setahun</option>
                                <option value="kurang dari setahun" {{ old('stts_kerja') === 'kurang dari setahun' ? 'selected' : '' }}>Kurang dari setahun</option>
                            </select>
                            @error('stts_kerja')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jns_thn_kndr" class="form-label">Jenis Tahun Kendaraan</label>
                            <input type="text" class="form-control @error('jns_thn_kndr') is-invalid @enderror" id="jns_thn_kndr" name="jns_thn_kndr" value="{{ old('jns_thn_kndr') }}" required>
                            @error('jns_thn_kndr')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mm_kndr" class="form-label">Merek Kendaraan</label>
                            <input type="text" class="form-control @error('mm_kndr') is-invalid @enderror" id="mm_kndr" name="mm_kndr" value="{{ old('mm_kndr') }}" required>
                            @error('mm_kndr')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jngka_wktu" class="form-label">Jangka Waktu</label>
                            <input type="text" class="form-control @error('jngka_wktu') is-invalid @enderror" id="jngka_wktu" name="jngka_wktu" value="{{ old('jngka_wktu') }}" required>
                            @error('jngka_wktu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" required>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="byr_bln" class="form-label">Pembayaran Perbulan</label>
                            <input type="number" class="form-control @error('byr_bln') is-invalid @enderror" id="byr_bln" name="byr_bln" value="{{ old('byr_bln') }}" required>
                            @error('byr_bln')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ttl_byr" class="form-label">Total Bayar</label>
                            <input type="number" class="form-control @error('ttl_byr') is-invalid @enderror" id="ttl_byr" name="ttl_byr" value="{{ old('ttl_byr') }}" required>
                            @error('ttl_byr')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endslot

</x-Layout.Master>

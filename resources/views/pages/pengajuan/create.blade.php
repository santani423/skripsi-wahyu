<x-Layout.Master title="Pengajuan">

    @slot('breadcrumbRight')
    <div class="ms-auto">
        <!-- Right breadcrumb content -->
    </div>
    @endslot
    @slot('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const kendaraanSelect = document.getElementById('id_kendaraan');
            const bungaSelect = document.getElementById('tgl_bunga');
            const hargaInput = document.getElementById('harga');
            const byrBlnInput = document.getElementById('byr_bln');
            const ttlByrInput = document.getElementById('ttl_byr');

            function updateHarga() {
                const selectedOption = kendaraanSelect.options[kendaraanSelect.selectedIndex];
                const harga = selectedOption.getAttribute('data-harga');
                hargaInput.value = harga ? harga : '';
                updatePembayaranPerBulan();
            }

            function updatePembayaranPerBulan() {
                const harga = parseFloat(hargaInput.value);
                const selectedBungaOption = bungaSelect.options[bungaSelect.selectedIndex];
                const bunga = parseFloat(selectedBungaOption.getAttribute('data-bunga'));

                if (!isNaN(harga) && !isNaN(bunga)) {
                    const pembayaranPerBulan = harga * (bunga / 100);
                    byrBlnInput.value = pembayaranPerBulan.toFixed(2);
                    ttlByrInput.value = (harga + pembayaranPerBulan).toFixed(2);
                } else {
                    byrBlnInput.value = '';
                    ttlByrInput.value = '';
                }
            }

            kendaraanSelect.addEventListener('change', updateHarga);
            bungaSelect.addEventListener('change', updatePembayaranPerBulan);

            // Trigger change event on page load to populate the fields if values are already selected
            if (kendaraanSelect.value) {
                kendaraanSelect.dispatchEvent(new Event('change'));
            }
            if (bungaSelect.value) {
                bungaSelect.dispatchEvent(new Event('change'));
            }
        });
    </script>
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
                    <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="mb-3">
                            <label for="id_kendaraan" class="form-label">Kendaraan</label>
                            <select name="id_kendaraan" id="id_kendaraan" class="form-control @error('id_kendaraan') is-invalid @enderror">
                                <option value="">Pilih Kendaraan</option>
                                @foreach($kendaraans as $kt)
                                    <option value="{{ $kt->id }}" data-harga="{{ $kt->nilai }}" {{ old('id_kendaraan') == $kt->id ? 'selected' : '' }}>{{ $kt->nama_kendaraan }}</option>
                                @endforeach
                            </select>
                            @error('id_kendaraan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl_bunga" class="form-label">Bunga</label>
                            <select name="tgl_bunga" id="tgl_bunga" class="form-control @error('tgl_bunga') is-invalid @enderror">
                                <option value="">Pilih Bunga</option>
                                @foreach($bunga as $kt)
                                    <option value="{{ $kt->id }}" data-bunga="{{ $kt->bunga_perbulan }}" {{ old('tgl_bunga') == $kt->id ? 'selected' : '' }}>{{ $kt->jangka_waktu }}</option>
                                @endforeach
                            </select>
                            @error('tgl_bunga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="tgl_bayar" value="{{date('Y-m-d')}}">
                        <!-- <div class="mb-3">
                            <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
                            <input type="date" class="form-control @error('tgl_bayar') is-invalid @enderror" id="tgl_bayar" name="tgl_bayar" value="{{ old('tgl_bayar') }}" required>
                            @error('tgl_bayar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="umur" class="form-label">Umur</label>
                            <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" value="{{ old('umur') }}" required>
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
                        <div class="mb-3">
                            <label for="ktp" class="form-label">Upload KTP</label>
                            <input type="file" class="form-control @error('ktp') is-invalid @enderror" id="file_ktp" name="file_ktp" required>
                            @error('ktp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="npwp" class="form-label">Upload NPWP</label>
                            <input type="file" class="form-control @error('npwp') is-invalid @enderror" id="file_npwp" name="file_npwp" required>
                            @error('npwp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kk" class="form-label">Upload KK</label>
                            <input type="file" class="form-control @error('kk') is-invalid @enderror" id="file_kk" name="file_kk" required>
                            @error('kk')
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

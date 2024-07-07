<x-Layout.Master title="Detail Pengajuan">

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
                    Detail Pengajuan
                </div>
                <div class="card-body">
                @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID Pengajuan</th>
                                <td>{{ $pengajuan->id_pengajuan }}</td>
                            </tr>
                            <tr>
                                <th>ID Kendaraan</th>
                                <td>{{ $pengajuan->id_kendaraan }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Bunga</th>
                                <td>{{ $pengajuan->tgl_bunga }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Bayar</th>
                                <td>{{ $pengajuan->tgl_bayar }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $pengajuan->nama }}</td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <td>{{ $pengajuan->umur }}</td>
                            </tr>
                            <tr>
                                <th>Status Tempat Tinggal</th>
                                <td>{{ $pengajuan->Stts_tmpt_tgl }}</td>
                            </tr>
                            <tr>
                                <th>SLIK</th>
                                <td>{{ $pengajuan->slik }}</td>
                            </tr>
                            <tr>
                                <th>Gaji</th>
                                <td>{{ $pengajuan->gaji }}</td>
                            </tr>
                            <tr>
                                <th>Status Kerja</th>
                                <td>{{ $pengajuan->stts_kerja }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Tahun Kendaraan</th>
                                <td>{{ $pengajuan->jns_thn_kndr }}</td>
                            </tr>
                            <tr>
                                <th>Merek Kendaraan</th>
                                <td>{{ $pengajuan->mm_kndr }}</td>
                            </tr>
                            <tr>
                                <th>Jangka Waktu</th>
                                <td>{{ $pengajuan->jngka_wktu }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>{{ $pengajuan->harga }}</td>
                            </tr>
                            <tr>
                                <th>Pembayaran Perbulan</th>
                                <td>{{ $pengajuan->byr_bln }}</td>
                            </tr>
                            <tr>
                                <th>Total Bayar</th>
                                <td>{{ $pengajuan->ttl_byr }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="slik">SLIK</label>
                            <select name="slik" id="slik" class="form-control">
                                <option value="baik" {{ old('slik') == 'baik' ? 'selected' : '' }}>Baik</option>
                                <option value="buruk" {{ old('slik') == 'buruk' ? 'selected' : '' }}>Buruk</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="vehicleYear">Tahun Kendaraan</label>
                            <select name="vehicleYear" id="vehicleYear" class="form-control">
                                <option value="tinggi" {{ old('vehicleYear') == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
                                <option value="rendah" {{ old('vehicleYear') == 'rendah' ? 'selected' : '' }}>Rendah</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update SLIK</button>
                    </form>
                    
                    <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    @endslot

</x-Layout.Master>

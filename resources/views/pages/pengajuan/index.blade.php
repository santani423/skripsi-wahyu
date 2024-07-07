<x-Layout.Master title="Pengajuan">

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
                    <a href="{{ route('pengajuan.create') }}" class="btn btn-primary">Add Pengajuan</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    Data Pengajuan
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Pengajuan</th>
                                    <th>ID Kendaraan</th>
                                    <th>Tanggal Bunga</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Status Tempat Tinggal</th>
                                    <th>SLIK</th>
                                    <th>Gaji</th>
                                    <th>Status Kerja</th>
                                    <th>Jenis Tahun Kendaraan</th>
                                    <th>Merek Kendaraan</th>
                                    <th>Jangka Waktu</th>
                                    <th>Harga</th>
                                    <th>Pembayaran Perbulan</th>
                                    <th>Total Bayar</th>
                                    <th>Status Pengajuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengajuans as $pengajuan)
                                    <tr>
                                        <td>{{ $pengajuan->id_pengajuan }}</td>
                                        <td>{{ $pengajuan->id_kendaraan }}</td>
                                        <td>{{ $pengajuan->tgl_bunga }}</td>
                                        <td>{{ $pengajuan->tgl_bayar }}</td>
                                        <td>{{ $pengajuan->nama }}</td>
                                        <td>{{ $pengajuan->umur }}</td>
                                        <td>{{ $pengajuan->Stts_tmpt_tgl }}</td>
                                        <td>{{ $pengajuan->slik }}</td>
                                        <td>{{ $pengajuan->gaji }}</td>
                                        <td>{{ $pengajuan->stts_kerja }}</td>
                                        <td>{{ $pengajuan->jns_thn_kndr }}</td>
                                        <td>{{ $pengajuan->mm_kndr }}</td>
                                        <td>{{ $pengajuan->jngka_wktu }}</td>
                                        <td>{{ $pengajuan->harga }}</td>
                                        <td>{{ $pengajuan->byr_bln }}</td>
                                        <td>{{ $pengajuan->ttl_byr }}</td>
                                        <td> @if ($pengajuan->sts_pengajuan === null)
            <!-- Kosongkan jika null -->
        @elseif ($pengajuan->sts_pengajuan == 1)
            Pengajuan Diterima
        @elseif ($pengajuan->sts_pengajuan == 0)
            Pengajuan Ditolak
        @else
            <!-- Handle kondisi lain jika ada -->
             Pengahuan Sedang Ditinjau
        @endif</td>  
                                        <td> <a href="{{route('pengajuan.show',$pengajuan->id)}}" class="btn btn-success">Cek</a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    @endslot

</x-Layout.Master>

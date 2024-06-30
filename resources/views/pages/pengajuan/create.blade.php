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
                    <form action="{{ route('pengajuan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id_pengajuan" class="form-label">ID Pengajuan</label>
                            <input type="text" class="form-control" id="id_pengajuan" name="id_pengajuan" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_kendaraan" class="form-label">ID Kendaraan</label>
                            <input type="text" class="form-control" id="id_kendaraan" name="id_kendaraan" required>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_bunga" class="form-label">Tanggal Bunga</label>
                            <input type="text" class="form-control" id="tgl_bunga" name="tgl_bunga" required>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
                            <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="umur" class="form-label">Umur</label>
                            <input type="text" class="form-control" id="umur" name="umur" required>
                        </div>
                        <div class="mb-3">
                            <label for="Stts_tmpt_tgl" class="form-label">Status Tempat Tinggal</label>
                            <input type="text" class="form-control" id="Stts_tmpt_tgl" name="Stts_tmpt_tgl" required>
                        </div>
                        <div class="mb-3">
                            <label for="slik" class="form-label">SLIK</label>
                            <input type="text" class="form-control" id="slik" name="slik" required>
                        </div>
                        <div class="mb-3">
                            <label for="gaji" class="form-label">Gaji</label>
                            <input type="number" class="form-control" id="gaji" name="gaji" required>
                        </div>
                        <div class="mb-3">
                            <label for="stts_kerja" class="form-label">Status Kerja</label>
                            <input type="text" class="form-control" id="stts_kerja" name="stts_kerja" required>
                        </div>
                        <div class="mb-3">
                            <label for="jns_thn_kndr" class="form-label">Jenis Tahun Kendaraan</label>
                            <input type="text" class="form-control" id="jns_thn_kndr" name="jns_thn_kndr" required>
                        </div>
                        <div class="mb-3">
                            <label for="mm_kndr" class="form-label">Merek Kendaraan</label>
                            <input type="text" class="form-control" id="mm_kndr" name="mm_kndr" required>
                        </div>
                        <div class="mb-3">
                            <label for="jngka_wktu" class="form-label">Jangka Waktu</label>
                            <input type="text" class="form-control" id="jngka_wktu" name="jngka_wktu" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="byr_bln" class="form-label">Pembayaran Perbulan</label>
                            <input type="number" class="form-control" id="byr_bln" name="byr_bln" required>
                        </div>
                        <div class="mb-3">
                            <label for="ttl_byr" class="form-label">Total Bayar</label>
                            <input type="number" class="form-control" id="ttl_byr" name="ttl_byr" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endslot

</x-Layout.Master>

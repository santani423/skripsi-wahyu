<x-Layout.Master title="Start">
    @slot('body')
    <div class="row">
        <div class="col-xl-12">
            <h6 class="mb-0 text-uppercase"></h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <!-- Formulir Tambah Nama Dosen -->
                    <form action="{{ route('profile-skripsi.store') }}" method="POST">
                        @csrf <!-- Token CSRF untuk keamanan -->
                        <div class="mb-3 row">
                            <!-- Label untuk input nama dosen -->
                            <label for="namaDosen" class="col-sm-2 col-form-label">Nama Dosen</label>
                            <div class="col-sm-10">
                                <!-- Input nama dosen dengan class form-control dari Bootstrap untuk responsivitas -->
                                <input type="text" class="form-control" id="namaDosen" name="name"
                                    placeholder="Masukkan Nama Dosen">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- Label untuk input nama dosen -->
                            <label for="emailDosen" class="col-sm-2 col-form-label">Emeil Dosen</label>
                            <div class="col-sm-10">
                                <!-- Input nama dosen dengan class form-control dari Bootstrap untuk responsivitas -->
                                <input type="email" class="form-control" id="emailDosen" name="email"
                                    placeholder="Masukkan Email Dosen">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- Label untuk input API ID -->
                            <label for="apiId" class="col-sm-2 col-form-label">API ID</label>
                            <div class="col-sm-10">
                                <!-- Input API ID dengan class form-control dari Bootstrap untuk responsivitas -->
                                <input type="text" class="form-control" id="apiId" name="profile_dosen_id"
                                    placeholder="Masukkan API ID">
                            </div>
                        </div>
                        <!-- Tombol Simpan -->
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
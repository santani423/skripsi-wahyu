<x-Layout.Master title="Edit Kendaraan">

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
                    Edit Kendaraan
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

                    <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="id_rule">Rule</label>
                            <select name="id_rule" id="id_rule" class="form-control">
                                <option value="">Pilih Rule</option>
                                @foreach($rules as $rule)
                                    @if($kendaraan->id_rule == $rule->id)
                                        <option value="{{$rule->id}}" selected>{{$rule->hasil}}</option>
                                    @else
                                        <option value="{{$rule->id}}">{{$rule->hasil}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="ketentuan">Ketentuan</label>
                            <select name="ketentuan" id="ketentuan" class="form-control">
                                <option value="">Pilih Ketentuan</option>
                                @foreach($ketentuans as $ketentuan)
                                    @if($kendaraan->ketentuan == $ketentuan->id)
                                        <option value="{{$ketentuan->id}}" selected>{{$ketentuan->ketentuan}}</option>
                                    @else
                                        <option value="{{$ketentuan->id}}">{{$ketentuan->ketentuan}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="operator">Operator</label>
                            <input type="text" name="operator" id="operator" class="form-control" value="{{ $kendaraan->operator }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nilai">Nilai</label>
                            <input type="text" name="nilai" id="nilai" class="form-control" value="{{ $kendaraan->nilai }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tahun_kendaraan">Tahun Kendaraan</label>
                            <input type="number" name="tahun_kendaraan" id="tahun_kendaraan" class="form-control" value="{{ $kendaraan->tahun_kendaraan }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_kendaraan">Nama Kendaraan</label>
                            <input type="text" name="nama_kendaraan" id="nama_kendaraan" class="form-control" value="{{ $kendaraan->nama_kendaraan }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="merek_kendaraan">Merek Kendaraan</label>
                            <input type="text" name="merek_kendaraan" id="merek_kendaraan" class="form-control" value="{{ $kendaraan->merek_kendaraan }}">
                        </div>

                        <button type="submit" class="btn btn-success">Update Kendaraan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endslot

</x-Layout.Master>

<x-Layout.Master title="Edit Bunga">

    @slot('breadcrumbRight')
    <div class="ms-auto">
        <!-- Right breadcrumb content -->
    </div>
    @endslot

    @slot('body')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Edit Bunga
                </div>
                <div class="card-body">
                    <form action="{{ route('bunga.update', $bunga->id_bunga) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="id_bunga" class="form-label">ID Bunga</label>
                            <input type="text" class="form-control" id="id_bunga" name="id_bunga" value="{{ $bunga->id_bunga }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="jangka_waktu" class="form-label">Jangka Waktu</label>
                            <input type="text" class="form-control" id="jangka_waktu" name="jangka_waktu" value="{{ $bunga->jangka_waktu }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="bunga_perbulan" class="form-label">Bunga Perbulan</label>
                            <input type="text" class="form-control" id="bunga_perbulan" name="bunga_perbulan" value="{{ $bunga->bunga_perbulan }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endslot

</x-Layout.Master>

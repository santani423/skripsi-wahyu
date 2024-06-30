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
                    Add Bunga
                </div>
                <div class="card-body">
                    <a href="{{ route('bunga.create') }}" class="btn btn-primary">Add Bunga</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Data Bunga
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Bunga</th>
                                <th>Jangka Waktu</th>
                                <th>Bunga Perbulan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bungas as $bunga)
                                <tr>
                                    <td>{{ $bunga->id_bunga }}</td>
                                    <td>{{ $bunga->jangka_waktu }}</td>
                                    <td>{{ $bunga->bunga_perbulan }}</td>
                                    <td>
                                        <a href="{{ route('bunga.edit', $bunga->id_bunga) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('bunga.destroy', $bunga->id_bunga) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endslot

</x-Layout.Master>

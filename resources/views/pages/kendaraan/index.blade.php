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
                    List Kendaraan
                    <a href="{{ route('kendaraan.create') }}" class="btn btn-primary float-end">Add Kendaraan</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Ketentuan</th>
                                <th>ID Rule</th>
                                <th>Ketentuan</th>
                                <th>Operator</th>
                                <th>Nilai</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kendaraans as $kendaraan)
                                <tr>
                                    <td>{{ $kendaraan->id_ketentuan }}</td>
                                    <td>{{ $kendaraan->id_rule }}</td>
                                    <td>{{ $kendaraan->ketentuan }}</td>
                                    <td>{{ $kendaraan->operator }}</td>
                                    <td>{{ $kendaraan->nilai }}</td>
                                    <td>
                                        <a href="{{ route('kendaraan.edit', $kendaraan->id_ketentuan) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('kendaraan.destroy', $kendaraan->id_ketentuan) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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

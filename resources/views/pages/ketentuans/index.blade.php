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
                    Ketentuans
                    <a href="{{ route('ketentuans.create') }}" class="btn btn-primary float-end">Add Ketentuan</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
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
                            @foreach($ketentuans as $ketentuan)
                                <tr>
                                    <td>{{ $ketentuan->id_ketentuan }}</td>
                                    <td>{{ $ketentuan->id_rule }}</td>
                                    <td>{{ $ketentuan->ketentuan }}</td>
                                    <td>{{ $ketentuan->operator }}</td>
                                    <td>{{ $ketentuan->nilai }}</td>
                                    <td>
                                        <a href="{{ route('ketentuans.edit', $ketentuan->id_ketentuan) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('ketentuans.destroy', $ketentuan->id_ketentuan) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ketentuan?')">Delete</button>
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

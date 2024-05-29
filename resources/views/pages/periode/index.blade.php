<x-Layout.Master title="Periode">
    @slot('breadcrumbRight')
    <div class="ms-auto"> 
        <a href="{{ route('periode.create') }}" class="btn-group">
            <button type="button" class="btn btn-primary">Tambah</button> 
        </a>
    </div>
    @endslot

    @slot('body')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Tanggal Berakhir</th>
                                <th scope="col">Status Aktif</th> <!-- Added column for Status Aktif -->
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $periode)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $periode->tahun }}</td>
                                <td>{{ $periode->status_semester }}</td>
                                <td>{{ $periode->tanggal_awal }}</td>
                                <td>{{ $periode->tanggal_akhir }}</td>
                                <td>{{ $periode->is_active ? 'Aktif' : 'Tidak Aktif' }}</td> <!-- Display is_active status -->
                                <td>
                                    <a href="{{ route('periode.edit', $periode->id) }}" class="btn btn-success">Ubah</a>
                                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $periode->id }})">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @foreach ($data as $periode)
                    <form id="delete-form-{{ $periode->id }}" action="{{ route('periode.destroy', $periode->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    @endforeach
                </div>
            </div> 
        </div>
    </div>
    @endslot
</x-Layout.Master>

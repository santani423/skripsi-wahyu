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

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Hapus</button>
      </div>
    </div>
  </div>
</div>

<script>
let periodeIdToDelete = null;

function confirmDelete(id) {
    periodeIdToDelete = id; // Simpan ID yang akan dihapus
    $('#confirmDeleteModal').modal('show'); // Tampilkan modal
}

document.getElementById('deleteConfirmBtn').addEventListener('click', function() {
    if(periodeIdToDelete) {
        document.getElementById('delete-form-' + periodeIdToDelete).submit();
    }
});
</script>
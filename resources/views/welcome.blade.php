<x-Layout.Master title="Start">

    @slot('breadcrumbRight')
    <div class="ms-auto">
        <div class="btn-group">
            <a class="dropdown-item" href="{{route('mahasiswa.daftar.skripsi')}}"> <button type="button"
                    class="btn btn-primary">Daftar
                    Skripsi</button></a>

        </div>
    </div>
    @endslot

    @slot('body')

    <h3 class="mb-0">Main Content</h3>

    @endslot
</x-Layout.Master>
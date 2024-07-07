<!-- resources/views/bunga/create.blade.php -->
<x-Layout.Master title="Add Bunga">

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
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('bunga.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="jangka_waktu" class="form-label">Jangka Waktu</label>
                            <input type="text" class="form-control" id="jangka_waktu" name="jangka_waktu" required>
                        </div>
                        <div class="mb-3">
                            <label for="bunga_perbulan" class="form-label">Bunga Perbulan</label>
                            <input type="text" class="form-control" id="bunga_perbulan" name="bunga_perbulan" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endslot

</x-Layout.Master>

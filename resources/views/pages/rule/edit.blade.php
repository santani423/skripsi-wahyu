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
                    Edit Rule
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

                    <form action="{{ route('rule.update', $rule->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        
                        <div class="form-group mb-3">
                            <label for="hasil">Hasil</label>
                            <input type="text" name="hasil" class="form-control" value="{{ $rule->hasil }}">
                        </div>

                        <button type="submit" class="btn btn-success">Update Rule</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endslot

</x-Layout.Master>

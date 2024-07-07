<x-Layout.Master title="Rule">

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
                    Rules
                    <a href="{{ route('rule.create') }}" class="btn btn-primary float-end">Add Rule</a>
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
                                <th>ID Rule</th>
                                <th>Hasil</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rules as $key =>$rule)
                                <tr>
                                    <td>{{ ++$key}}</td>
                                    <td>{{ $rule->hasil }}</td>
                                    <td>
                                        <a href="{{ route('rule.edit', $rule->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('rule.destroy', $rule->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this rule?')">Delete</button>
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

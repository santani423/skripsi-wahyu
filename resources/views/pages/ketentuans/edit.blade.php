<x-Layout.Master title="Edit Ketentuan">

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
                    Edit Ketentuan
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

                    <form action="{{ route('ketentuans.update', $ketentuan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="id_rule">Rule</label>
                            <select name="id_rule" id="" class="form-control">
                                @foreach($rules as $rule)
                                    @if($rule->id == $ketentuan->id_rule)
                                        <option value="{{$rule->id}}" selected>{{$rule->hasil}}</option>
                                    @else
                                        <option value="{{$rule->id}}">{{$rule->hasil}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_rule">ID Rule</label>
                            <input type="text" name="id_rule" class="form-control" value="{{ $ketentuan->id_rule }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="ketentuan">Ketentuan</label>
                            <input type="text" name="ketentuan" class="form-control" value="{{ $ketentuan->ketentuan }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="operator">Operator</label>
                            <input type="text" name="operator" class="form-control" value="{{ $ketentuan->operator }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nilai">Nilai</label>
                            <input type="text" name="nilai" class="form-control" value="{{ $ketentuan->nilai }}" required>
                        </div>

                        <button type="submit" class="btn btn-success">Update Ketentuan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endslot

</x-Layout.Master>

@extends ('layouts.default')

@section ('contenu')

<div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Update label</h3>
                <form action="{{ route('roles.update', $role->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="label">Label</label>
                        <input type="text" class="form-control" id="label" name="label"
                            value="{{ $role->label }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update label</button>
                </form>
            </div>
        </div>
    </div>
@stop
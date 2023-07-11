@extends('backEnd.admin_master')

@section('content')

<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-4">
            <div class="card">
                <div class="card-header bg-light text-dark">Edit Category</div>

                @if ($errors->any())

                    <div class="alert alert-danger mt-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                <div class="card-body">
                    <form action="{{ route('admin.update',$category->id )}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Add Category">
                        <button type="submit" class="btn btn-outline-success form-control-sm mt-2">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

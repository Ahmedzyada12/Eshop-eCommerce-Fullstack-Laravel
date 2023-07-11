@extends('backEnd.admin_master')

@section('content')


<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-4">
            <div class="card">
                <div class="card-header bg-light text-dark">Trashed Category</div>
                    @if (session('success'))
                    <div class="alert alert-dark m-2">
                        {{session('success')}}
                    </div>
                    @endif
                <div class="card-body">
                    @if (count($categories)>0)
                    <table class="table table-bordered table-striped table-hover">

                        <tr class="bg-dark">
                          <th class="text-light" scope="col">ID</th>
                          <th class="text-light" scope="col">Name</th>
                          <th class="text-light" scope="col">Restore</th>
                          <th class="text-light" scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        @php
                        $id=0;
                        @endphp

                        @foreach ($categories as $category)
                         <tr>
                          <td>{{ ++$id }}</td>
                          <td>{{$category->name}}</td>
                          <td><a href="{{ route('admin.restore',$category->id )}}" class="btn btn-warning">Restore</a></td>
                          <td><a href="{{ route('admin.hdelete', $category->id) }}" class="btn btn-dark">delete</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @else
                    <h1 class="text-center">No Category</h1>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

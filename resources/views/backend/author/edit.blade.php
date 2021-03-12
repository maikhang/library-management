@extends('admin.admin_master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Author</h1>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('author.update', $authors->id) }}">
                    {{method_field('PUT')}}
                    @csrf

                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" class="form-control mb-1" id="exampleInputName1" placeholder="Name of Category" value="{{ $authors->name }}">
                        @error('name')
                        <span class="text-danger" role="alert">
                            <h6>{{ $message }}</h6>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Biography</label>
                        <textarea id="editor" name="biography" class="form-control mb-1" rows="50">{{ $authors->biography }}</textarea>
                        @error('biography')
                        <span class="text-danger" role="alert">
                            <h6>{{ $message }}</h6>
                        </span>
                        @enderror
                      </div>
                      
                      {{-- Script for Editor --}}
                      <script>
                        ClassicEditor
                            .create( document.querySelector('#editor'))
                            .catch( error => {
                                console.error( error );
                            } );
                      </script>

                      <button type="submit" name="submit" class="btn btn-success mb-2">Update</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
@extends('admin.admin_master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create Author</h1>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('author.store') }}">
                    @csrf

                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <sup style="color: red">*</sup>
                        <input type="text" name="name" class="form-control mb-1" id="exampleInputName1" placeholder="Name of Category" value="{{old('name')}}">
                        @error('name')
                        <span class="text-danger" role="alert">
                            <h6>{{ $message }}</h6>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Biography</label>
                        <textarea id="editor" name="biography" class="form-control mb-1" rows="50"></textarea>
                        @error('biography')
                        <span class="text-danger" role="alert">
                            <h6>{{ $message }}</h6>
                        </span>
                        @enderror
                      </div>
                                       
                      <button type="submit" name="submit" class="btn btn-success mb-2">Add</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
{{-- Script for Editor --}}
<script>
  ClassicEditor
      .create( document.querySelector('#editor'))
      .catch( error => {
          console.error( error );
      } );
</script>
@endsection
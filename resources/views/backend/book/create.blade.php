@extends('admin.admin_master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create Book</h1>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('book.store') }}">
                    @csrf

                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <sup style="color: red">*</sup>
                        <input type="text" name="name" class="form-control mb-1" id="exampleInputName1" placeholder="Name of Book" value="{{old('name')}}">
                        @error('name')
                        <span class="text-danger" role="alert">
                            <h6>{{ $message }}</h6>
                        </span>
                        @enderror
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label for="exampleInputName1">Category</label>
                          <sup style="color: red">*</sup>
                          <select class="form-control selectpicker" data-live-search="true" name="category" title="Choose one of the following...">
                            @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                          @error('category')
                          <span class="text-danger" role="alert">
                              <h6>{{ $message }}</h6>
                          </span>
                          @enderror
                        </div>
  
                        <div class="form-group col-md-4">
                          <label for="exampleInputName1">Author</label>
                          <sup style="color: red">*</sup>
                          <select class="form-control selectpicker" data-live-search="true" multiple title="Choose one or more of the following..." name="author[]">
                            @foreach ($authors as $author)
                            <option value="{{ $author->name }}">{{ $author->name }}</option>
                            @endforeach
                          </select>
                          @error('author')
                          <span class="text-danger" role="alert">
                              <h6>{{ $message }}</h6>
                          </span>
                          @enderror
                        </div>

                        <div class="form-group col-md-4">
                          <label for="exampleInputName1">Status</label>
                          <sup style="color: red">*</sup>
                          <select class="form-control selectpicker" name="status" title="Choose one of the following...">
                            <option value="In Stock" data-content="<h5><span class='badge badge-success'>In Stock</span></h5>">In Stock</option>
                            <option value="Out of Stock" data-content="<h5><span class='badge badge-danger'>Out of Stock</span></h5>">Out of Stock</option>
                          </select>
                          @error('status')
                          <span class="text-danger" role="alert">
                              <h6>{{ $message }}</h6>
                          </span>
                          @enderror
                        </div>
                      </div>
                      

                      <div class="form-group">
                        <label for="exampleInputName1">Summary</label>
                        <textarea id="editor" name="summary" class="form-control mb-1" rows="50"></textarea>
                        @error('summary')
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

                      <button type="submit" name="submit" class="btn btn-success mb-2">Add</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
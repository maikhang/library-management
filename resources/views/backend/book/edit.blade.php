@extends('admin.admin_master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Book</h1>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('book.update', $books->id) }}">
                    {{method_field('PUT')}}
                    @csrf

                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" class="form-control mb-1" id="exampleInputName1" placeholder="Name of Category" value="{{ $books->name }}">
                        @error('name')
                        <span class="text-danger" role="alert">
                            <h6>{{ $message }}</h6>
                        </span>
                        @enderror
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label for="exampleInputName1">Category</label>
                          <select class="form-control selectpicker" data-live-search="true" name="category" title="Choose one of the following...">
                            @foreach ($categories as $category)
                            <option value="{{ $category->name }}" @php if($category->name == $books->category) echo "selected"; @endphp>{{ $category->name }}</option>
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
                          <select class="form-control selectpicker" data-live-search="true" multiple title="Choose one or more of the following..." name="author[]">
                            {{-- @foreach ($authors as $author)
                            <option value="{{ $author->name }}"  @php if($author->name == $books->author) echo "selected" @endphp>{{ $author->name }}</option>
                            @endforeach --}}
                            @foreach($authors as $author)
                              @if(in_array($author->name, $bookIds))
                              <option value="{{ $author->name }}" selected>{{ $author->name }}</option>
                              @else
                              <option value="{{ $author->name }}">{{ $author->name }}</option>
                              @endif 
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
                          <select class="form-control selectpicker" name="status" title="Choose one of the following...">
                            <option value="In Stock" data-content="<h5><span class='badge badge-success'>In Stock</span></h5>" @php if($books->status == "In Stock") echo "selected"; @endphp>In Stock</option>
                            <option value="Out of Stock" data-content="<h5><span class='badge badge-danger'>Out of Stock</span></h5>" @php if($books->status == "Out of Stock") echo "selected"; @endphp>Out of Stock</option>
                          </select>
                          @error('status')
                          <span class="text-danger" role="alert">
                              <h6>{{ $message }}</h6>
                          </span>
                          @enderror
                        </div>
                      </div>

                      {{-- <div class="row">
                        <div class="form-group col-md-4">
                          <label for="exampleInputName1">Category</label>
                          <select class="form-control js-example-basic-single" name="category">
                            @foreach ($categories as $category)
                            <option value="{{ $category->name }}" @php if($category->name == $books->category) echo "selected"; @endphp>{{ $category->name }}</option>
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
                          <select class="form-control js-example-basic-single" name="author">
                            @foreach ($authors as $author)
                            <option value="{{ $author->name }}" @php if($author->name == $books->author) echo "selected"; @endphp>{{ $author->name }}</option>
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
                          <select class="form-control" name="status">
                            <option value="In Stock" @php if($books->status == "In Stock") echo "selected"; @endphp>In Stock</option>
                            <option value="Out of Stock" @php if($books->status == "Out of Stock") echo "selected"; @endphp>Out of Stock</option>
                          </select>
                          @error('status')
                          <span class="text-danger" role="alert">
                              <h6>{{ $message }}</h6>
                          </span>
                          @enderror
                        </div>
                      </div> --}}
                      

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

                      <button type="submit" name="submit" class="btn btn-success mb-2">Update</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
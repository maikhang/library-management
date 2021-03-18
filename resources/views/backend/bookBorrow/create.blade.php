@extends('admin.admin_master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create Book Borrow</h1>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('bookBorrow.store') }}">
                    @csrf

                      <div class="form-group">
                        <label for="exampleInputName1">Book</label>
                        <select class="form-control selectpicker" data-live-search="true" multiple  name="book[]" title="Choose one or more of the following...">
                          @foreach ($books as $book)
                          <option value="{{ $book->name }}">{{ $book->name }}</option>
                          @endforeach
                        </select>
                        @error('book')
                        <span class="text-danger" role="alert">
                            <h6>{{ $message }}</h6>
                        </span>
                        @enderror
                      </div>

                      {{-- <div class="row">  --}}
                        <div class="form-group">
                          <label for="exampleInputName1">User</label>
                          <select class="form-control selectpicker" data-live-search="true" title="Choose one of the following..." name="email">
                            @foreach ($users as $user)
                            <option value="{{ $user->email }}" data-subtext="{{ $user->email }}">{{ $user->name }}</option>
                            @endforeach
                          </select>
                          @error('email')
                          <span class="text-danger" role="alert">
                              <h6>{{ $message }}</h6>
                          </span>
                          @enderror
                        </div>

                        {{-- <div class="form-group col-md-4">
                          <label for="exampleInputName1">Status</label>
                          <select class="form-control selectpicker" name="status" title="Choose one of the following...">
                            <option value="Borrowing" data-content="<h5><span class='badge badge-warning'>Borrowing</span></h5>">Borrowing</option>
                            <option value="Completed" data-content="<h5><span class='badge badge-success'>Completed</span></h5>">Completed</option>
                          </select>
                          @error('status')
                          <span class="text-danger" role="alert">
                              <h6>{{ $message }}</h6>
                          </span>
                          @enderror
                        </div> --}}
                      {{-- </div> --}}
                      
                      <button type="submit" name="submit" class="btn btn-success mb-2">Add</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
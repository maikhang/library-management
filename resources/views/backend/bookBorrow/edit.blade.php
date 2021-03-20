@extends('admin.admin_master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Book Borrow</h1>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('bookBorrow.update', $book_borrows->id) }}">
                    {{method_field('PUT')}}
                    @csrf

                      <div class="form-group">
                        <label for="exampleInputName1">Book</label>
                        <sup style="color: red">*</sup>
                        <select class="form-control selectpicker" data-live-search="true" multiple  name="book[]" title="Choose one or more of the following...">
                          @foreach ($books as $book)
                            @if(in_array($book->name, $bookBorrowIds))
                            <option value="{{ $book->name }}" selected>{{ $book->name }}</option>
                            @elseif ((!is_array($book->name)) && ($book->name == $book_borrows->book))
                            <option value="{{ $book->name }}" selected>{{ $book->name }}</option>
                            @else
                            <option value="{{ $book->name }}">{{ $book->name }}</option>
                            @endif 
                          @endforeach
                        </select>
                        @error('book')
                        <span class="text-danger" role="alert">
                            <h6>{{ $message }}</h6>
                        </span>
                        @enderror
                      </div>

                      <div class="row"> 
                        <div class="form-group col-md-8">
                          <label for="exampleInputName1">User</label>
                          <sup style="color: red">*</sup>
                          <select class="form-control selectpicker" data-live-search="true" title="Choose one of the following..." name="email">
                            @foreach ($users as $user)
                            <option value="{{ $user->email }}" data-subtext="{{ $user->email }}" @php if($user->email == $book_borrows->email) echo "selected"; @endphp>{{ $user->name }}</option>
                            @endforeach
                          </select>
                          @error('email')
                          <span class="text-danger" role="alert">
                              <h6>{{ $message }}</h6>
                          </span>
                          @enderror
                        </div>

                        <div class="form-group col-md-4">
                          <label for="exampleInputName1">Status</label>
                          <sup style="color: red">*</sup>
                          <select class="form-control selectpicker" name="status" title="Choose one of the following...">
                            <option value="Borrowing" data-content="<h5><span class='badge badge-warning'>Borrowing</span></h5>" @php if($book_borrows->status == "Borrowing") echo "selected" @endphp>Borrowing</option>
                            <option value="Completed" data-content="<h5><span class='badge badge-success'>Completed</span></h5>" @php if($book_borrows->status == "Completed") echo "selected" @endphp>Completed</option>
                          </select>
                          @error('status')
                          <span class="text-danger" role="alert">
                              <h6>{{ $message }}</h6>
                          </span>
                          @enderror
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label for="exampleInputName1">Borrow Time</label>
                          <span class="form-control mb-1">{{ date('H:i:s / d-m-Y', strtotime($book_borrows->borrow_time)) }}</span>
                        </div>
                        
                        <div class="form-group col-md-6">
                          <label for="exampleInputName1">Completed Time</label>
                          @if ($book_borrows->status == "Completed")
                          <span class="form-control mb-1">{{ date('H:i:s / d-m-Y', strtotime($book_borrows->completed_time)) }}</span>
                          @else
                          <span class="form-control mb-1">Books are not completed</span>
                          @endif
                        </div>
                      </div>

                      <button type="submit" name="submit" class="btn btn-success mb-2">Update</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
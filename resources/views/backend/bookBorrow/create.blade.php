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
                        <sup style="color: red">*</sup>
                        <select class="form-control selectpicker" data-live-search="true" multiple  name="book[]" title="Choose one or more of the following...">
                          @foreach ($categories as $category)
                            <optgroup label="{{ $category->name }}">
                              @foreach ($books as $book)
                              @if ($book->category === $category->name)
                                <option value="{{ $book->name }}" @php if($book->status==='Out of Stock') echo 'disabled'; @endphp>{{ $book->name }}</option>
                              @endif
                              @endforeach
                            </optgroup>
                          @endforeach
                        </select>
                        @error('book')
                        <span class="text-danger" role="alert">
                            <h6>{{ $message }}</h6>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">User</label>
                        <sup style="color: red">*</sup>
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
{{-- Custom Script --}}
<script>
  // bootstrap-select
  $("select").selectpicker();                        
</script>
@endsection
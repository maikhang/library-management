@extends('admin.admin_master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create User</h1>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('user.store') }}">
                    @csrf

                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Name</label>
                          <sup style="color: red">*</sup>
                          <input type="text" name="name" class="form-control mb-1" placeholder="Name of User" value="{{old('name')}}">
                          @error('name')
                          <span class="text-danger" role="alert">
                              <h6>{{ $message }}</h6>
                          </span>
                          @enderror
                        </div>

                        <div class="form-group col-md-6">
                          <label>Email</label>
                          <sup style="color: red">*</sup>
                          <input type="email" name="email" class="form-control mb-1" placeholder="Email of User" value="{{old('email')}}">
                          @error('email')
                          <span class="text-danger" role="alert">
                              <h6>{{ $message }}</h6>
                          </span>
                          @enderror
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label>Address</label>
                        <sup style="color: red">*</sup>
                        <input type="text" name="address" class="form-control mb-1" placeholder="Address of User" value="{{old('address')}}">
                        @error('address')
                        <span class="text-danger" role="alert">
                            <h6>{{ $message }}</h6>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label>Phone</label>
                        <sup style="color: red">*</sup>
                        <input type="text" name="phone" class="form-control mb-1" placeholder="Phone of User" value="{{old('phone')}}">
                        @error('phone')
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
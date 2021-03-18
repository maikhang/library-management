@extends('admin.admin_master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">      

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit User</h1>

        <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" action="{{ route('user.update', $users->id) }}">
                  {{method_field('PUT')}}
                  @csrf

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control mb-1" placeholder="Name of User" value="{{$users->name}}">
                        @error('name')
                        <span class="text-danger" role="alert">
                            <h6>{{ $message }}</h6>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control mb-1" placeholder="Email of User" value="{{$users->email}}">
                        @error('email')
                        <span class="text-danger" role="alert">
                            <h6>{{ $message }}</h6>
                        </span>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control mb-1" placeholder="Address of User" value="{{$users->address}}">
                      @error('address')
                      <span class="text-danger" role="alert">
                          <h6>{{ $message }}</h6>
                      </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" name="phone" class="form-control mb-1" placeholder="Phone of User" value="{{$users->phone}}">
                      @error('phone')
                      <span class="text-danger" role="alert">
                          <h6>{{ $message }}</h6>
                      </span>
                      @enderror
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
@extends('admin.admin_master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Category List</h1>
        <p class="mb-4">All data about the Categories of Book are available here</p>
        <a href="{{ route('category.create') }}" class="btn btn-success btn-icon-split mb-2">
            <span class="text">Add New</span>
        </a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @php($row=1)
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $row++ }}</td>
                                <td>{{ $category->name }}</td>
                                <td style="width: 30%">
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>  
                                        </span>
                                    </a>
                                    <a  
                                        class="btn btn-danger btn-icon-split"
                                        onclick="if(confirm('Do you want to delete?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form{{$category->id}}').submit()
                                        }else{
                                            event.preventDefault();
                                        }"
                                    >
                                        <form id="delete-form{{$category->id}}" method="POST" action="{{route('category.destroy', $category->id)}}" >
                                            @csrf
                                            {{method_field('DELETE')}}
                                        </form>
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
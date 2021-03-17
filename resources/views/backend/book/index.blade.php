@extends('admin.admin_master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Book List</h1>
        <p class="mb-4">All data about the Books are available here</p>
        <a href="{{ route('book.create') }}" class="btn btn-success btn-icon-split mb-2">
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
                                <th>Belong Category</th>
                                <th>Belong Author</th>
                                <th>Status</th>
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
                            @foreach ($books as $book)
                            <tr>
                                <td>{{ $row++ }}</td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->category }}</td>
                                <td>
                                @if (is_array($book->author))
                                    @php($lastItem = Arr::last($book->author))
                                    @foreach ($book->author as $item)
                                        @if ($item == $lastItem)
                                            {{ $item }}
                                        @else 
                                            {{ $item }}, 
                                        @endif
                                        {{-- {{ $item }} --}}
                                    @endforeach
                                @else
                                    {{ $book->author }}
                                @endif
                                </td>
                                {{-- <td>{{ $book->author }}</td> --}}
                                <td>
                                    @if ($book->status == "In Stock")
                                        <h5>
                                            <span class="badge badge-success">{{ $book->status }}</span>
                                        </h5>
                                    @else
                                        <h5>
                                            <span class="badge badge-danger">{{ $book->status }}</span>
                                        </h5>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </a>
                                    <a  
                                        class="btn btn-danger btn-icon-split"
                                        onclick="if(confirm('Do you want to delete?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form{{$book->id}}').submit()
                                        }else{
                                            event.preventDefault();
                                        }"
                                    >
                                        <form id="delete-form{{$book->id}}" method="POST" action="{{route('book.destroy', $book->id)}}" >
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
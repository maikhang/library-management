@extends('admin.admin_master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Book Borrow List</h1>
        <p class="mb-4">All data about the Book Borrows are available here</p>
        <a href="{{ route('bookBorrow.create') }}" class="btn btn-success btn-icon-split mb-2">
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
                                <th>Book</th>
                                <th>Email</th>
                                {{-- <th>Time</th> --}}
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
                            @foreach ($book_borrows as $book_borrow)
                            <tr>
                                <td>{{ $row++ }}</td>
                                <td>
                                    @if (is_array($book_borrow->book))
                                        @php($lastItem = Arr::last($book_borrow->book))
                                        @foreach ($book_borrow->book as $item)
                                            @if ($item == $lastItem)
                                                {{ $item }}
                                            @else 
                                                {{ $item }}, 
                                            @endif
                                        @endforeach
                                    @else
                                        {{ $book_borrow->book }}
                                    @endif
                                </td>
                                <td>{{ $book_borrow->email }}</td>
                                {{-- <td>{{ date('H:i:s / d-m-Y', strtotime($book_borrow->borrow_time)) }}</td> --}}
                                <td>
                                    @if ($book_borrow->status == "Borrowing")
                                        <h5>
                                            <span class="badge badge-warning">{{ $book_borrow->status }}</span>
                                        </h5>
                                    @else
                                        <h5>
                                            <span class="badge badge-success">{{ $book_borrow->status }}</span>
                                        </h5>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('bookBorrow.edit', $book_borrow->id) }}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </a>
                                    <a  
                                        class="btn btn-danger btn-icon-split"
                                        onclick="if(confirm('Do you want to delete?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form{{$book_borrow->id}}').submit()
                                        }else{
                                            event.preventDefault();
                                        }"
                                    >
                                        <form id="delete-form{{$book_borrow->id}}" method="POST" action="{{route('bookBorrow.destroy', $book_borrow->id)}}" >
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
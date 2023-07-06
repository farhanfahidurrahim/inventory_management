@extends('backend.layouts.master')
@section('title','Index | Product')
@section('content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $page_title }}</h4>
                        <a href="{{ route('product.create') }}" class="btn btn-danger" style="display: block; float: right">Product Create</a>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <th>Sl No.</th>
                                <th>Thumbnail</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Supllier</th>
                                <th>Brand</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration++ }}</td>
                                        <td><img src="{{ asset($row->image) }}" style="width: 75px; height: 50px" alt="img"></td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->category->name }}</td>
                                        <td>{{ $row->supplier->name }}</td>
                                        <td>{{ $row->brand }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('supplier.edit',$row->id) }}">Edit</a> |
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$row->id}}">Delete</button>
                                        </td>
                                    </tr>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$row->id}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                    <form action="{{ route('supplier.destroy',$row->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection

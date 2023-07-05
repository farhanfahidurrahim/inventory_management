@extends('backend.layouts.master')
@section('title','Index | Customer')
@section('content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $page_title }}</h4>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <th>Sl No.</th>
                                <th>Thumbnail</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                {{-- @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration++ }}</td>
                                        <td><img src="{{ asset($row->image) }}" style="width: 75px; height: 50px" alt="supplier img"></td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->address }}</td>
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
                                @endforeach --}}
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

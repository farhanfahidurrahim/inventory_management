@extends('backend.layouts.master')
@section('title','Create | Product')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>New Unit Input</h4>
                </div>

                <form action="{{ route('unit.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="status" value="1">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Name" class="form-control">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Short Form</label>
                            <div class="input-group">
                                <input type="text" name="short_form" value="{{ old('short_form') }}" placeholder="Enter Short Form" class="form-control">
                            </div>
                            @error('short_form')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $('.dropify').dropify();
    </script>

@endsection

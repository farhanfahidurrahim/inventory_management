@extends('backend.layouts.master')
@section('title','Edit | Product')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product Edit</h4>
                </div>

                <form action="{{ route('product.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="1">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $data->name }}" placeholder="Enter Name" class="form-control">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="dropify" name="image" data-default-file="{{ asset($data->image) }}" class="form-control" accept="image/*">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                <option selected disabled value="">Select Category</option>
                                @foreach ($categories as $category)
                                    @if ($category->id==$data->category_id)
                                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Supplier</label>
                            <select name="supplier_id" id="" class="form-control">
                                <option selected disabled value="">Select Supplier</option>
                                @foreach ($suppliers as $supplier)
                                    @if ($supplier->id==$data->supplier_id)
                                    <option selected value="{{ $supplier->id }}">{{ $category->name }}</option>
                                    @endif
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                            @error('supplier_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Brand</label> <span style="color: red">*optional</span>
                            <div class="input-group">
                                <input type="text" name="brand" value="{{ $data->brand }}" placeholder="Enter Brand" class="form-control">
                            </div>
                            @error('brand')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Update</button>
                            <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
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

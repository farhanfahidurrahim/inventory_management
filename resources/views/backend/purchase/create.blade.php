@extends('backend.layouts.master')
@section('title','Create | Product')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create New Purchase</h4>
                </div>

                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="status" value="1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Purchase No.</label>
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Name" class="form-control">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Paid Amount</label> <span style="color: red">*optional</span>
                                    <div class="input-group">
                                        <input type="text" name="brand" value="{{ old('brand') }}" placeholder="Enter Brand" class="form-control">
                                    </div>
                                    @error('brand')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <select name="supplier_id" id="" class="form-control">
                                        <option selected disabled value="">Select Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <table class="table table-responsive table-stripped">
                                    <thead>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Product</th>
                                        <th class="text-center">Unit</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Total</th>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Choose Category</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Choose Product</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Choose Unit</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control" name=""></td>
                                            <td><input type="text" class="form-control" name=""></td>
                                            <td><input type="text" class="form-control" name=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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

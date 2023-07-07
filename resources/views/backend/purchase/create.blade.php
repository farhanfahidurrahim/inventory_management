@extends('backend.layouts.master')
@section('title','Create | Product')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create New Purchase</h4>
                </div>

                <form action="{{ route('purchase.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="status" value="1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Purchase No.</label>
                                    <input type="text" name="purchase_no" value="{{ old('purchase_no') }}" placeholder="Enter Purchase No" class="form-control">
                                    @error('purchase_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Paid Amount</label> <span style="color: red">*optional</span>
                                    <div class="input-group">
                                        <input type="text" name="paid_amount" value="{{ old('paid_amount') }}" placeholder="Enter Paid Amount" class="form-control">
                                    </div>
                                    @error('paid_amount')
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
                                        <th class="text-center">
                                            <button onclick="cloneRow()" type="button" class="btn btn-success"><i class="fas fa-plus"></i> Add New</button>
                                        </th>
                                    </thead>

                                    <tbody class="tbody">
                                        <tr class="tr">
                                            <td>
                                                <select name="category_id[]" id="" class="form-control">
                                                    <option selected disabled value="">Choose Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="product_id[]" id="" class="form-control">
                                                    <option selected disabled value="">Choose Product</option>
                                                    @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="unit_id[]" id="" class="form-control">
                                                    <option selected disabled value="">Choose Unit</option>
                                                    @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control" name="quantity[]" placeholder="Enter Quantity"></td>
                                            <td><input type="text" class="form-control" name="unit_price[]" placeholder="Enter Unit Price"></td>
                                            <td><input type="text" class="form-control" placeholder="Total" disabled></td>
                                            <td><button type="button" onclick="removeRow(event)" class="btn btn-danger">X</button></td>
                                        </tr>
                                    </tbody>

                                    <tfoot>
                                        <th colspan="5">Total</th>
                                        <th><input class="form-control" type="text" name="total" placeholder="All Total" disabled></th>
                                    </tfoot>
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

        function cloneRow(){
            const tr= `
            <tr class="tr">
                <td>
                    <select name="category_id[]" id="" class="form-control">
                        <option selected disabled value="">Choose Category</option>
                        @foreach ($categories as $category)
                        <option value="">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="product_id[]" id="" class="form-control">
                        <option selected disabled value="">Choose Product</option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="unit_id[]" id="" class="form-control">
                        <option selected disabled value="">Choose Unit</option>
                        @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="text" class="form-control" name="quantity[]" placeholder="Enter Quantity"></td>
                <td><input type="text" class="form-control" name="unit_price[]" placeholder="Enter Unit Price"></td>
                <td><input type="text" class="form-control" name="total[]" placeholder="Enter Total"></td>
                <td><button type="button" onclick="removeRow(event)" class="btn btn-danger">X</button></td>
            </tr>
            `;

            $('.tbody').append(tr);
        }

        function removeRow(event){
            if ($('.tr').length > 1) {
                $(event.target).closest('.tr').remove();
            }
        }

    </script>

@endsection

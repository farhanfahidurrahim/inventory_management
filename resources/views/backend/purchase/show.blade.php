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
                                    <input type="text" name="purchase_no" value="{{ $data->purchase_no }}" placeholder="Enter Purchase No" class="form-control" readonly>
                                    @error('purchase_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Paid Amount</label> <span style="color: red">*optional</span>
                                    <div class="input-group">
                                        <input type="number" name="paid_amount" value="{{ $data->paid_amount }}" placeholder="Enter Paid Amount" class="form-control" readonly>
                                    </div>
                                    @error('paid_amount')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <input type="text" value="{{ $data->supplier->name }}" class="form-control" disabled>
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

                                    <tbody class="tbody">
                                        @foreach ($data->purchasemeta as $item)
                                        <tr class="tr">
                                            <td>
                                                <input type="text" value="{{ $item->category->name }}" class="form-control" disabled>
                                            </td>
                                            <td>
                                                <input type="text" value="{{ $item->product->name }}" class="form-control" disabled>
                                            </td>
                                            <td>
                                                <input type="text" value="{{ $item->unit->name }}" class="form-control" disabled>
                                            </td>
                                            <td><input type="text" value="{{ $item->quantity }}" class="form-control" disabled></td>
                                            <td><input type="text" value="{{ $item->unit_price }}" class="form-control" disabled></td>
                                            <td><input type="text" value="{{ $item->quantity*$item->unit_price }}" class="form-control" disabled></td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <th colspan="5">Total</th>
                                        <th><input class="form-control" type="text" name="total_amount" id="total" value="{{ $data->total_amount }}" readonly></th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('purchase.index') }}" class="btn btn-info">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function cloneRow(){
            let count = 2;
            const tr= `
            <tr class="tr">
                <td>
                    <select name="category_id[]" id="category_${count}" class="form-control category">
                        <option selected disabled value="">Choose Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="product_id[]" id="product_${count}" class="form-control">
                        <option selected>Choose Product</option>
                    </select>
                </td>
                <td>
                    <select name="unit_id[]" id="unit_${count}" class="form-control">
                        <option selected disabled value="">Choose Unit</option>
                        @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="text" name="quantity[]" onkeyup="calculateTotal(event)" id="quantity_${count}" class="form-control" placeholder="Enter Quantity"></td>
                <td><input type="text" name="unit_price[]" onkeyup="calculateTotal(event)" id="price_${count}" class="form-control" placeholder="Enter Unit Price"></td>
                <td><input type="text" id="total_${count}" class="form-control total" placeholder="Total" readonly></td>
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

        function calculateTotal(event){

            let allTotal = 0;

            const id= $(event.target).attr('id');
            const num= id.split('_');
            const quantity= parseFloat($('#quantity_'+num[1]).val());
            const price= $('#price_'+num[1]).val();
            const total= quantity*price;
            $('#total_'+num[1]).val(total);

            $('.total').each(function(){
                const value= parseFloat($(this).val());
                allTotal += value;
            })

            $('#total').val(allTotal);
        }

        $(document).on('change','.category', function(){
            const id= $(this).val();
            const dataId=$(this).attr('id');
            const num=dataId.split('_');

            $.ajax({
                type:"get",
                url:"{{ route('get.product', '') }}" + "/" + id,
                dataType: "json",
                success:function(data){
                    let html = '<option selected>Choose Product</option>';
                    data.forEach(product=>{
                        html += `<option value="${product.id}">${product.name}</option>`;
                    });
                    $('#product_'+num[1]).html(html);
                }
            });

        })

    </script>

@endsection

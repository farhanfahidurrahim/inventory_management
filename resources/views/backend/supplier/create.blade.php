@extends('backend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Supplier Input Text</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                </div>
                            </div>
                            <input type="file" class="form-control phone-number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="email" name="email" placeholder="email" class="form-control pwstrength" data-indicator="pwindicator">
                        </div>
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <input type="number" name="phone" placeholder="phone" class="form-control currency">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-home"></i>
                                </div>
                            </div>
                            <input type="text" name="address" placeholder="Address" class="form-control currency">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

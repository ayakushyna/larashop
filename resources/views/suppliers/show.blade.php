@extends('layouts.master')

@section('content')
    <!-- Start Page Content -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-two">
                        <header>
                            <h3>{{ $supplier->name }}</h3>
                        </header>
                        <div class="desc">
                            {{ $supplier->country }}
                        </div>
                        <div class="dl > dt desc">
                            <dl>
                                <dt>Email:</dt>
                                <dd>{{ $supplier->email }}</dd>
                                <dt>Phone:</dt>
                                <dd>{{ $supplier->phone }}</dd>
                            </dl>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home" role="tab">Timeline</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="settings" role="tabpanel">
                        <div class="card-body">
                            <h3 class="card-title m-t-15">Personal Info</h3>
                            <hr>
                            <form class="form-material"
                                  method="POST"
                                  {{--action="{{route('suppliers.update', ['supplier' => $supplier['id']])}}"--}}>
                                @csrf
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Full Name</label>
                                    <input type="text" value="{{ $supplier->name }}" class="form-control form-control-line" name="name" id="name{{$supplier['id']}}" required>
                                    <span class="text-danger">
                                        <strong id="name-error{{$supplier['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="credit">Credit, $</label>
                                    <input type="number" step="0.01" value="{{ $supplier->credit }}" class="form-control form-control-line" id="credit{{$supplier['id']}}" name="credit" required>
                                    <span class="text-danger">
                                        <strong id="credit-error{{$supplier['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="prepayment">Prepayment, $</label>
                                    <input type="number" step="0.01" value="{{ $supplier->prepayment }}" class="form-control form-control-line" id="prepayment{{$supplier['id']}}" name="prepayment" required>
                                    <span class="text-danger">
                                        <strong id="prepayment-error{{$supplier['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="email">Email</label>
                                    <input type="email" value="{{ $supplier->email }}" class="form-control form-control-line" name="email" id="email{{$supplier['id']}}" required>
                                    <span class="text-danger">
                                        <strong id="email-error{{$supplier['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="phone">Phone</label>
                                    <input type="text" value="{{ $supplier->phone }}" class="form-control form-control-line" name="phone" id="phone{{$supplier['id']}}" required>
                                    <span class="text-danger">
                                        <strong id="phone-error{{$supplier['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="country">Select Country</label>
                                    <select class="form-control form-control-line" name="country" id="country{{$supplier['id']}}">
                                        @foreach($countries as $country)
                                            @if($country == $supplier->country)
                                                <option selected>{{ $country }}</option>
                                            @else <option>{{ $country }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        <strong id="country-error{{$supplier['id']}}"></strong>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success"  id="submit{{$supplier['id']}}" >Submit</button>
                                    </div>
                                </div>
                                @include('layouts.errors')
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="home" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Product</th>
                                        <th>Storage</th>
                                        <th>Price per tonne, $</th>
                                        <th>Tonnes</th>
                                        <th>Shipping cost, $</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($supplier->arrivals as $index => $arrival)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $arrival->product->name }}</td>
                                            <td>{{ $arrival->storage->name }}</td>
                                            <td>{{ $arrival->price_per_tonne }}</td>
                                            <td>{{ $arrival->tonnes }}</td>
                                            <td>{{ $arrival->shipping_cost }}</td>
                                            <td>{{ $arrival->created_at->toDateString() }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    @include('suppliers.editscript')
    <!-- End PAge Content -->
@endsection('content')
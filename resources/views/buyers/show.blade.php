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
                            <h3>{{ $buyer->name }}</h3>
                        </header>
                        <div class="desc">
                            {{ $buyer->country }}
                        </div>
                        <div class="dl > dt desc">
                            <dl>
                                <dt>Email:</dt>
                                <dd>{{ $buyer->email }}</dd>
                                <dt>Phone:</dt>
                                <dd>{{ $buyer->phone }}</dd>
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
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Timeline</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#edit" role="tab">Edit</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="timeline" role="tabpanel">
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
                                    @foreach($buyer->departures as $index => $departure)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $departure->product->name }}</td>
                                            <td>{{ $departure->storage->name }}</td>
                                            <td>{{ $departure->price_per_tonne }}</td>
                                            <td>{{ $departure->tonnes }}</td>
                                            <td>{{ $departure->shipping_cost }}</td>
                                            <td>{{ $departure->created_at->toDateString() }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="edit" role="tabpanel">
                        <div class="card-body">
                            <h3 class="card-title m-t-15">Personal Info</h3>
                            <hr>
                            <form class="form-material"
                                  method="POST"
                                    {{--action="{{route('suppliers.update', ['supplier' => $supplier['id']])}}"--}}>
                                @csrf
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name{{$buyer['id']}}">Full Name</label>
                                    <input type="text" value="{{ $buyer->name }}" class="form-control form-control-line" name="name" id="name{{$buyer['id']}}" required>
                                    <span class="text-danger">
                                        <strong id="name-error{{$buyer['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="credit{{$buyer['id']}}">Credit, $</label>
                                    <input type="number" step="0.01" value="{{ $buyer->credit }}" class="form-control form-control-line" id="credit{{$buyer['id']}}" name="credit" required>
                                    <span class="text-danger">
                                        <strong id="credit-error{{$buyer['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="prepayment{{$buyer['id']}}">Prepayment, $</label>
                                    <input type="number" step="0.01" value="{{ $buyer->prepayment }}" class="form-control form-control-line" id="prepayment{{$buyer['id']}}" name="prepayment" required>
                                    <span class="text-danger">
                                        <strong id="prepayment-error{{$buyer['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="email{{$buyer['id']}}">Email</label>
                                    <input type="email" value="{{ $buyer->email }}" class="form-control form-control-line" name="email" id="email{{$buyer['id']}}" required>
                                    <span class="text-danger">
                                        <strong id="email-error{{$buyer['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="phone{{$buyer['id']}}">Phone</label>
                                    <input type="text" value="{{ $buyer->phone }}" class="form-control form-control-line" name="phone" id="phone{{$buyer['id']}}" required>
                                    <span class="text-danger">
                                        <strong id="phone-error{{$buyer['id']}}"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="country{{$buyer['id']}}">Select Country</label>
                                    <select class="form-control form-control-line" name="country" id="country{{$buyer['id']}}">
                                        @foreach($countries as $country)
                                            @if($country == $buyer->country)
                                                <option selected>{{ $country }}</option>
                                            @else <option>{{ $country }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        <strong id="country-error{{$buyer['id']}}"></strong>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success"  id="submit{{$buyer['id']}}" >Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    @include('buyers.editscript')
    <!-- End PAge Content -->
@endsection('content')
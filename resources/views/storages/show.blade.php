@extends('layouts.master')

@section('content')
    @include("arrivals.edit")
    @include("departures.edit")
    <!-- Start Page Content -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-two">
                        <header>
                            <h3>{{ $storage->name }}</h3>
                        </header>
                        <div class="dl > dt desc">
                            <dl>
                                <dt>Arrivals:</dt>
                                <dd>{{  count($storage->arrivals) }}</dd>
                                <dt>Departures:</dt>
                                <dd>{{ count($storage->departures) }}</dd>
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
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#arrivals" role="tab">Arrivals</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#departures" role="tab">Departures</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="arrivals" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Product</th>
                                        <th>Supplier</th>
                                        <th>Price per tonne, $</th>
                                        <th>Tonnes</th>
                                        <th>Shipping cost, $</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($arrivals as $index => $arrival)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $arrival->product->name }}</td>
                                            <td>
                                                <a href="/suppliers/{{ $arrival->supplier->id }}">
                                                    {{ $arrival->supplier->name }}
                                                </a>
                                            </td>
                                            <td>{{ $arrival->price_per_tonne }}</td>
                                            <td>{{ $arrival->tonnes }}</td>
                                            <td>{{ $arrival->shipping_cost }}</td>
                                            <td>{{ $arrival->created_at->toDateString() }}</td>
                                            <td>
                                                <div class="row sweetalert justify-content-center">
                                                    <div>
                                                        <button class="edit-arrival" data-toggle="modal" data-target="#edit-arrival{{$arrival['id']}}" title="Edit" type="button" style="border: 0; background:0">
                                                            <span class="material-icons">&#xE254;</span>
                                                        </button>
                                                    </div>
                                                    <div>
                                                        <button class="delete-arrival" onclick = "deleteArrival({{ $arrival->id }})" title="Delete" data-toggle="tooltip" type="button" style="border: 0; background:0">
                                                            <span class="material-icons">&#xE872;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="departures" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Product</th>
                                        <th>Buyer</th>
                                        <th>Price per tonne, $</th>
                                        <th>Tonnes</th>
                                        <th>Shipping cost, $</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($departures as $index => $departure)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $departure->product->name }}</td>
                                            <td>
                                                <a href="/buyers/{{ $departure->buyer->id }}">
                                                    {{ $departure->buyer->name }}
                                                </a>
                                            </td>
                                            <td>{{ $departure->price_per_tonne }}</td>
                                            <td>{{ $departure->tonnes }}</td>
                                            <td>{{ $departure->shipping_cost }}</td>
                                            <td>{{ $departure->created_at->toDateString() }}</td>
                                            <td>
                                                <div class="row sweetalert justify-content-center">
                                                    <div>
                                                        <button class="edit-departure" data-toggle="modal" data-target="#edit-departure{{$departure['id']}}" title="Edit" type="button" style="border: 0; background:0">
                                                            <span class="material-icons">&#xE254;</span>
                                                        </button>
                                                    </div>
                                                    <div>
                                                        <button class="delete-departure" onclick = "deleteDeparture({{ $departure->id }})" title="Delete" data-toggle="tooltip" type="button" style="border: 0; background:0">
                                                            <span class="material-icons">&#xE872;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
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
    <script>
        function deleteArrival(arrivalId) {
            swal({
                title: "Are you sure to delete ?",
                text: "You will not be able to recover this imaginary file !!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it !!",
                closeOnConfirm: false
            }, function () {
                $.ajax({
                    url: "/arrivals/" + arrivalId + "/delete",
                    method: "POST",
                    data: {
                        id: arrivalId,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(response) {
                        swal({
                            title: "Hey!",
                            text: response.success,
                            type: "success"
                        }, function () {
                            location.reload();
                        });
                    }, error: function(response){
                        swal("Oops", "We couldn't connect to the server!", response);
                    }
                })
            })
        }
    </script>

    <script>
        function deleteDeparture(departureId) {
            swal({
                title: "Are you sure to delete ?",
                text: "You will not be able to recover this imaginary file !!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it !!",
                closeOnConfirm: false
            }, function () {
                $.ajax({
                    url: "/departures/" + departureId + "/delete",
                    method: "POST",
                    data: {
                        id: departureId,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(response) {
                        swal({
                            title: "Hey!",
                            text: response.success,
                            type: "success"
                        }, function () {
                            location.reload();
                        });
                    }, error: function(response){
                        swal("Oops", "We couldn't connect to the server!", response);
                    }
                })
            })
        }
    </script>
    <!-- End PAge Content -->
@endsection('content')
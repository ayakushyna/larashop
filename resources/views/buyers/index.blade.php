@extends('layouts.master')

@section('content')
    @include("buyers.create")
    @include("buyers.edit")

    <div class="card">
        <div class="card-body">
            <div class="row justify-content-between">
                <h4 class="card-title">Buyers Table</h4>
                <button type="button" class="btn btn-info add-new" data-toggle="modal" data-target="#myModal" title="Create"><i class="fa fa-plus" ></i> Add New</button>
            </div>
            <div class="table-responsive m-t-40">
                <table id="example23" class="table table-bordered table-striped display nowrap table-hover" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Full Name</th>
                        <th>Credit, $</th>
                        <th>Prepayment, $</th>
                        <th>Departures</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>№</th>
                        <th>Full Name</th>
                        <th>Credit, $</th>
                        <th>Prepayment, $</th>
                        <th>Departures</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($buyers as $index => $buyer)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>
                                <a href="/buyers/{{ $buyer->id }}">
                                    {{ $buyer->name }}
                                </a>
                            </td>
                            <td>{{ $buyer->credit }}</td>
                            <td>{{ $buyer->prepayment }}</td>
                            <td>{{ count($buyer->departures) }}</td>
                            <td>{{ $buyer->country }}</td>
                            <td>
                                <div class="row sweetalert justify-content-center">
                                    <div>
                                        <button id="edit-buyer{{$buyer['id']}}" data-toggle="modal" data-target="#myModal{{$buyer->id}}" title="Edit" type="button" style="border: 0; background:0">
                                            <span class="material-icons">&#xE254;</span>
                                        </button>
                                    </div>
                                    <div>
                                        <button id="delete-buyer" onclick = "deleteSupplier({{ $buyer->id }})" title="Delete" data-toggle="tooltip" type="button" style="border: 0; background:0">
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
    <script>
        function deleteSupplier(buyerId) {
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
                    url: "/buyers/" + buyerId + "/delete",
                    method: "POST",
                    data: {
                        id: buyerId,
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


@endsection('content')
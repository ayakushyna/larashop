@extends('layouts.master')

@section('content')
    @include("suppliers.create")
    @include("suppliers.edit")

    <div class="card">
        <div class="card-body">
            <div class="row justify-content-between">
                <h4 class="card-title">Data Table</h4>
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
                        <th>Supplies</th>
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
                        <th>Supplies amount</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($suppliers as $index => $supplier)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>
                                <a href="/suppliers/{{ $supplier->id }}">
                                    {{ $supplier->name }}
                                </a>
                            </td>
                            <td>{{ $supplier->credit }}</td>
                            <td>{{ $supplier->prepayment }}</td>
                            <td>{{ count($supplier->arrivals) }}</td>
                            <td>{{ $supplier->country }}</td>
                            <td>
                                <div class="row sweetalert justify-content-center">
                                    <div>
                                        <button id="edit-supplier{{$supplier['id']}}" data-toggle="modal" data-target="#myModal{{$supplier->id}}" title="Edit" type="button" style="border: 0; background:0">
                                            <span class="material-icons">&#xE254;</span>
                                        </button>
                                    </div>
                                    <div>
                                        <button id="delete-supplier" onclick = "deleteSupplier({{ $supplier->id }})" title="Delete" data-toggle="tooltip" type="button" style="border: 0; background:0">
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
        function deleteSupplier(supplierId) {
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
                    url: "/suppliers/" + supplierId + "/delete",
                    method: "POST",
                    data: {
                        id: supplierId,
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
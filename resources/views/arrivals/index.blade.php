@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row justify-content-between">
            <div><h4 class="card-title">Data Table</h4></div>
            <div>
                <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
            </div>
        </div>
        <div class="table-responsive m-t-40">
            <table id="example23" class="table table-bordered table-striped display nowrap table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Product</th>
                    <th>Supplier</th>
                    <th>Storage</th>
                    <th>Price per tonne, $</th>
                    <th>Tonnes</th>
                    <th>Shipping cost, $</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>№</th>
                    <th>Product</th>
                    <th>Supplier</th>
                    <th>Storage</th>
                    <th>Price per tonne, $</th>
                    <th>Tonnes</th>
                    <th>Shipping cost, $</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
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
                    <td>{{ $arrival->storage->name }}</td>
                    <td>{{ $arrival->price_per_tonne }}</td>
                    <td>{{ $arrival->tonnes }}</td>
                    <td>{{ $arrival->shipping_cost }}</td>
                    <td>{{ $arrival->created_at->toDateString() }}</td>
                    <td>
                        <div class="row sweetalert justify-content-center">
                            <div>
                                <form action="">
                                    <button class="edit-arrival sweet-prompt" value="{{ $arrival->id }}" title="Edit" data-toggle="tooltip" type="button" style="border: 0; background:0">
                                        <span class="material-icons">&#xE254;</span>
                                    </button>
                                </form>
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
                            "id": arrivalId,
                            _token: '{{csrf_token()}}'
                        },
                    success: function(response) {
                            swal({
                                title: "Deleted",
                                text: response,
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
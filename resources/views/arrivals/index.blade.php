@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Table</h4>
        <h6 class="card-subtitle">Data table example</h6>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
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
                </tr>
                </thead>
                <tbody>
                @for($i = 0; $i < count($arrivals) ; $i++)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $arrivals[$i]->product->name }}</td>
                    <td>{{ $arrivals[$i]->supplier->name }}</td>
                    <td>{{ $arrivals[$i]->storage->name }}</td>
                    <td>{{ $arrivals[$i]->price_per_tonne }}</td>
                    <td>{{ $arrivals[$i]->tonnes }}</td>
                    <td>{{ $arrivals[$i]->shipping_cost }}</td>
                    <td>{{ $arrivals[$i]->created_at->toFormattedDateString() }}</td>
                </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection('content')
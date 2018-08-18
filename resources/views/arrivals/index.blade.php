@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Table</h4>
        <h6 class="card-subtitle">Data table example</h6>
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
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection('content')
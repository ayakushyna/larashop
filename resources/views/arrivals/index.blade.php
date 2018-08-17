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
                    <th>Продукт</th>
                    <th>Поставщик</th>
                    <th>Склад</th>
                    <th>Цена за тонну, $</th>
                    <th>Тонны</th>
                    <th>Стоимость доставки, $</th>
                    <th>Дата</th>
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
                    <td>{{ $arrival->storage->name }}</td>
                    <td>{{ $arrival->price_per_tonne }}</td>
                    <td>{{ $arrival->tonnes }}</td>
                    <td>{{ $arrival->shipping_cost }}</td>
                    <td>{{ $arrival->created_at->toFormattedDateString() }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection('content')